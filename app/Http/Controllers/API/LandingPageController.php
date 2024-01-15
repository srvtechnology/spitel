<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusinessProductCategory;
use App\Models\MerchantCategory;
use App\Models\MerchantProductCategory;
use App\Models\MerchantUser;
use App\Models\ProductCategories;
use App\Models\RepresentativeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\SaveMerchantRequest;
use Illuminate\Support\Facades\DB;
class LandingPageController extends Controller
{
    public function getMerchantCategories(Request $request){

        try {
            $getCat = BusinessProductCategory::where('business_type_id',$request->catType)->get();
            if (count($getCat) > 0){
                $getCat = $getCat->ToArray();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => $request->catType." Categories Found",
                    'data' => $getCat
                ];
            }else{
                $response = [
                    'success' => false,
                    'status' => 404,
                    'message' => $request->catType." Categories Not Found",

                ];
            }
        } catch (Throwable $e) {
            $response = [
                'success' => false,
                'status' => 500,
                'message' => "Something Went Wrong Please Try Again Later",
            ];
        }
        return response()->json($response,200);
    }

    public function checkMrRefCode(Request $request){
        try {
            $checkRef = RepresentativeUser::where('reference_code',$request->refCode)->get();
            if (count($checkRef) > 0){
                $checkRef = $checkRef->ToArray();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => "found",
                    'data' => $checkRef
                ];
            }else{
                $response = [
                    'success' => false,
                    'status' => 404,
                    'message' => "not found",

                ];
            }
        } catch (Throwable $e) {
            $response = [
                'success' => false,
                'status' => 500,
                'message' => "Something Went Wrong Please Try Again Later",
            ];
        }
        return response()->json($response,200);
    }

    public function saveMerchant(SaveMerchantRequest $request){
//        return $request->all();
        $userType ='merchant';
        $businnesName = $request->business_name;
        $businnesType = $request->business_type;
        $productCategory = $request->poroduct_category;
        $email = $request->email_communication;
        $rememberToken = $request->_token;
        $representative_user_id = $request->representive_user_id;
        $checkEmailExists = User::where('email',$email)->get();
        if(count($checkEmailExists) > 0 ){
            $response = [
                'success' => false,
                'status' => 200,
                'message' => "email found",
            ];
            return response()->json($response,200);
        }
        $NewUser = User::create([
            'name' =>$businnesName,
            'email' =>$email,
            'user_type' =>'merchant',
            'status' => 2,
        ]);

        $contact_number = $request->contact_number;
        $manager_name = $request->manager_name;
        $mob_of_manger = $request->mob_of_manger;
        $address = $request->address;
        $lat = $request->lat ;
        $lng = $request->lng;
        $license_no = $request->license_no;
        $communication_reg_no = $request->communication_reg_no;
        $tax_no = $request->tax_no;
        $representative_offer = $request->representative_offer;

        $comCertificateFile = '';
        $taxCertificateFile = '';

        if($request->hasFile('comCertificateFile') ){
            $image = $request->file('comCertificateFile');
            $currentDate = now()->format('Y_m_d');
            $randomString = Str::random(20);
            $extension = $image->getClientOriginalExtension();
            $uniqueFilename = $currentDate . '_' . $randomString . '.' . $extension;

            $image->storeAs('assets/merchant/commercialCertificates', $uniqueFilename, 'public');
            $comCertificateFile = $uniqueFilename;
        }
        if($request->hasFile('taxCertificateFile') ){
            $image = $request->file('taxCertificateFile');
            $currentDate = now()->format('Y_m_d');
            $randomString = Str::random(20);
            $extension = $image->getClientOriginalExtension();
            $uniqueFilename = $currentDate . '_' . $randomString . '.' . $extension;

            $image->storeAs('assets/merchant/taxCertificates', $uniqueFilename, 'public');
            $taxCertificateFile = $uniqueFilename;
        }
        $NewMerchant = MerchantUser::create([
            'business_name'=>$businnesName,
            'business_type_id'=>$businnesType,
            'contact_number'=>$contact_number,
            'contact_address'=>$address,
            'lat'=>$lat,
            'long'=>$lng,
            'contact_email'=>$email,
            'director_name'=>$manager_name,
            'director_mob_no'=>$mob_of_manger,
            'license_no'=>$license_no,
            'commercial_reg_no'=>$communication_reg_no,
            'representative_referral_code'=>$representative_offer,
            'tax_no'=>$tax_no,
            'referral_user_id'=>$representative_user_id,
            'user_id'=>$NewUser->id,
            'tax_certificate'=>$taxCertificateFile,
            'commercial_certificate'=>$comCertificateFile,
        ]);
        if(!empty($productCategory)){
            foreach ($productCategory as $list){
                if ($list !==null){
                    MerchantProductCategory::create([
                        'business_product_category_id'=>intval($list),
                        'user_id'=>$NewUser->id,
                    ]);
                }
            }
        }

        $response = [
            'success' => true,
            'status' => 200,
            'message' => "New Merchant Created Successfully",

        ];
        return response()->json($response,200);
    }

    public function saveRepresentative(Request $request){
        $getLastReferenceCode = RepresentativeUser::select('reference_code')->orderBy('id', 'desc')->limit(1)->get();
        $referenceCode ="sr0001";
        $userType ='representative';
        $name = $request->name;
        $mobile_no = $request->mobile_no;
        $email = $request->email;
        $id_number = $request->id_number;
        $city = $request->city;
        $rememberToken = $request->_token;
        $neighborhood = $request->neighborhood;
        $neighborhood_1 = $request->neighborhood_1;

        $checkEmailExists = User::where('email',$email)->get();
        if(count($checkEmailExists) > 0 ){
            $response = [
                'success' => false,
                'status' => 200,
                'message' => "email found",
            ];
            return response()->json($response,200);
        }
        $NewUser = User::create([
            'name' =>$name,
            'email' =>$email,
            'user_type' =>$userType,
            'status' => 2,
        ]);

        $other_doc_file = '';
        $representative_img_file = '';
        $id_upload_file = '';

        if($request->hasFile('other_doc_file') ){
            $image = $request->file('other_doc_file');
            $currentDate = now()->format('Y_m_d');
            $randomString = Str::random(20);
            $extension = $image->getClientOriginalExtension();
            $uniqueFilename = $currentDate . '_' . $randomString . '.' . $extension;

            $image->storeAs('assets/representative/otherDocs', $uniqueFilename, 'public');
            $other_doc_file = $uniqueFilename;
        }
        if($request->hasFile('representative_img_file') ){
            $image = $request->file('representative_img_file');
            $currentDate = now()->format('Y_m_d');
            $randomString = Str::random(20);
            $extension = $image->getClientOriginalExtension();
            $uniqueFilename = $currentDate . '_' . $randomString . '.' . $extension;

            $image->storeAs('assets/representative/imgs', $uniqueFilename, 'public');
            $representative_img_file = $uniqueFilename;
        }
        if($request->hasFile('id_upload_file') ){
            $image = $request->file('id_upload_file');
            $currentDate = now()->format('Y_m_d');
            $randomString = Str::random(20);
            $extension = $image->getClientOriginalExtension();
            $uniqueFilename = $currentDate . '_' . $randomString . '.' . $extension;

            $image->storeAs('assets/representative/idsUpload', $uniqueFilename, 'public');
            $id_upload_file = $uniqueFilename;
        }
        if(count($getLastReferenceCode) > 0){
            $getLastReferenceCode = $getLastReferenceCode[0]->reference_code;
            $getLastReferenceCode = explode('sr',$getLastReferenceCode);
            $LastReferenceCode = $getLastReferenceCode[1];
            $referenceCode = "sr000".$LastReferenceCode + 1;
        }
        $NewRepresentative = RepresentativeUser::create([
            'name'=>$name,
            'email'=>$email,
            'mobile_no'=>$mobile_no,
            'id_number'=>$id_number,
            'city_id'=>$city,
            'neighborhood'=>$neighborhood,
            'neighborhood_1'=>$neighborhood_1,
            'other_doc'=>$other_doc_file,
            'img'=>$representative_img_file,
            'id_upload'=>$id_upload_file,
            'reference_code'=>$referenceCode,
            'user_id'=>$NewUser->id,
        ]);

        $response = [
            'success' => true,
            'status' => 200,
            'message' => "New Representative Created Successfully",

        ];
        return response()->json($response,200);
    }
}
