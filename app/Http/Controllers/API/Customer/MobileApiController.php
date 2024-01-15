<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PromoCode;
use App\Models\MerchantUser;
use App\Models\BusinessProductCategory;
use App\Models\Banner;
use App\Models\Review;
use App\Models\BusinessType;
use App\Http\Traits\message;
use Validator;

class MobileApiController extends Controller
{
    use message;

    public function customerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::where('phone', '=', $request->phone)->first();
        if ($user) {
            Auth::login($user);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return $this->sendResponse($success, 'Successfully.');
        } else {
            $input = $request->all();
            $input['email'] = $request->phone . '@gmail.com';
            $input['phone'] = $request->phone;
            $input['user_type'] = 'customer';
            $input['status'] = 1;
            $user = User::create($input);
            Auth::login($user);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return $this->sendResponse($success, 'Successfully.');
        }
    }

    public function customerDetail()
    {
        $success = Auth::user();
        return $this->sendResponse($success, 'Successfully.');
    }

    public function dashboard()
    {
        $allBanners = Banner::where('status', 1)->get();
        $businessType = BusinessType::with('businessProductCategory')->get();
        $data = [
            'banners' => $allBanners,
            'businessType' => $businessType
        ];
        return $this->sendResponse($data, 'Successfully.');
    }

    public function allMerchant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_type_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 401);
        }

        $query = MerchantUser::leftJoin('users', 'merchant_users.user_id', '=', 'users.id')
        ->where('users.status', '=', 1)
        ->where('business_type_id', $request->business_type_id);
        $allMerchant = $query->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review']);
        $allMerchant = $query->paginate(10);
        return $this->sendResponse($allMerchant, 'Successfully.');
    }

    public function discountedMerchant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_type_id' => 'required',
            'discount' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 401);
        }

        $query = MerchantUser::leftJoin('users', 'merchant_users.user_id', '=', 'users.id')
        ->where('users.status', '=', 1)
        ->where('business_type_id', $request->business_type_id);
        $merchantsUserIds = $query->pluck('user_id');
        $promoCodeMerchantIds = PromoCode::whereIn('user_id', $merchantsUserIds)->where('created_by_type', 'merchant')->pluck('user_id')->toArray();
        $allMerchant = $query->whereIn('user_id', $promoCodeMerchantIds);
        $allMerchant = $query->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review']);
        $allMerchant = $query->paginate(10);
        return $this->sendResponse($allMerchant, 'Successfully.');
    }

    public function nearByMerchant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_type_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 401);
        }

        $query = MerchantUser::leftJoin('users', 'merchant_users.user_id', '=', 'users.id')
            ->where('users.status', '=', 1)
            ->where('business_type_id', $request->business_type_id);

        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $query->select([
            'merchant_users.*',
            'users.status as user_status',
            \DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(`lat`)) * cos(radians(`long`) - radians($longitude)) + sin(radians($latitude)) * sin(radians(`lat`)))) AS distance")
        ]);

        $query->having('distance', '<=', 5);
        $query->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review']);
        $allMerchant = $query->paginate(10);


        return $this->sendResponse($allMerchant, 'Successfully.');
    }

    public function topRatedMerchant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_type_id' => 'required',
            'top_rated' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 401);
        }

        $query = MerchantUser::leftJoin('users', 'merchant_users.user_id', '=', 'users.id')
        ->where('users.status', '=', 1)
        ->where('business_type_id', $request->business_type_id);

        $merchant_list_ids = [];
        $merchantsUserIds = $query->pluck('user_id');

        foreach ($merchantsUserIds as $merchant_user_id) {
            $top_merchant_reviews_total = Review::where('merchant_user_id', $merchant_user_id)
                ->where('type', 1)->pluck('rating')->count();
            $top_merchant_reviews_sum = Review::where('merchant_user_id', $merchant_user_id)
                ->where('type', 1)->pluck('rating')->sum();

            if ($top_merchant_reviews_total > 0) {
                $rating = $top_merchant_reviews_sum / $top_merchant_reviews_total;
                $merchant = MerchantUser::where('user_id', $merchant_user_id)->first();
                $merchant['total_reviews'] = $rating;

                if (!in_array($merchant->user_id, $merchant_list_ids)) {
                    $merchant_list_ids[] = $merchant->user_id;
                }
            }
        }

        $allMerchant = MerchantUser::leftJoin('users', 'merchant_users.user_id', '=', 'users.id')
        ->where('users.status', '=', 1)
        ->whereIn('user_id', $merchant_list_ids)
            ->distinct()
            ->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review'])
            ->paginate(10);

        // $latitude = $request->latitude;
        // $longitude = $request->longitude;
        // $query->selectRaw("*, (6371 * acos(cos(radians($latitude)) * cos(radians(`lat`)) * cos(radians(`long`) - radians($longitude)) + sin(radians($latitude)) * sin(radians(`lat`)))) AS distance");
        // $query->having('distance', '<=', 5);
        // $allMerchant = $query->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review']);
        // $allMerchant = $query->get();
        return $this->sendResponse($allMerchant, 'Successfully.');
    }

    public function dashboardFilter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_type_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 401);
        }

        $query = MerchantUser::leftJoin('users', 'merchant_users.user_id', '=', 'users.id')
        ->where('users.status', '=', 1)
        ->where('business_type_id', $request->business_type_id);

        if (!empty($request->latitude) && !empty($request->longitude)) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $query->selectRaw("*, (6371 * acos(cos(radians($latitude)) * cos(radians(`lat`)) * cos(radians(`long`) - radians($longitude)) + sin(radians($latitude)) * sin(radians(`lat`)))) AS distance");
            $query->having('distance', '<=', 5);
            $query->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review']);
            $merchants = $query->get();
        } elseif (!empty($request->discount) && $request->discount == true) {
            $merchantsUserIds = $query->pluck('user_id');
            $promoCodeMerchantIds = PromoCode::whereIn('user_id', $merchantsUserIds)->where('created_by_type', 'merchant')->pluck('user_id')->toArray();
            $merchants = $query->whereIn('user_id', $promoCodeMerchantIds);
            $merchants = $query->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review']);
            $merchants = $query->get();
        } elseif (!empty($request->top_rated) && $request->top_rated == true) {
            $merchant_list_ids = [];
            $merchantsUserIds = $query->pluck('user_id');

            foreach ($merchantsUserIds as $merchant_user_id) {
                $top_merchant_reviews_total = Review::where('merchant_user_id', $merchant_user_id)
                    ->where('type', 1)->pluck('rating')->count();
                $top_merchant_reviews_sum = Review::where('merchant_user_id', $merchant_user_id)
                    ->where('type', 1)->pluck('rating')->sum();

                if ($top_merchant_reviews_total > 0) {
                    $rating = $top_merchant_reviews_sum / $top_merchant_reviews_total;
                    $merchant = MerchantUser::where('user_id', $merchant_user_id)->first();
                    $merchant['total_reviews'] = $rating;

                    if (!in_array($merchant->user_id, $merchant_list_ids)) {
                        $merchant_list_ids[] = $merchant->user_id;
                    }
                }
            }

            $merchants = MerchantUser::whereIn('user_id', $merchant_list_ids)
                ->with(['merchantProductCategory.businessProductCategory', 'favourite', 'review'])
                ->distinct()
                ->get();
        } else {
            $merchants = $query->get();
        }

        return $this->sendResponse($merchants, 'Successfully.');
    }

    public function productCatergory(Request $request)
    {
        $businessCategory = BusinessProductCategory::where('business_type_id', $request->business_type_id)->where('status', 1)->get();
        return $this->sendResponse($businessCategory, 'Successfully.');
    }
}
