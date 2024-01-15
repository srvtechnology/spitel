<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Customer,
	Surname,
	FamilyMember
};

class AnniversaryController extends Controller
{
    public function index(Request $request)
    {
		$filter_from = date("Y-m-d", strtotime('first day of this month', time()));
        $filter_to = date("Y-m-d", strtotime('last day of this month', time()));

        if ($request->has('from_day') && $request->from_day != "" && $request->has('from_month') && $request->from_month != '' && $request->has('to_day') && $request->to_day != "" && $request->has('to_month') && $request->to_month != "") {
	        $from_day = $request->from_day;
	        $from_month = $request->from_month;
	        $to_day = $request->to_day;
	        $to_month = $request->to_month;
        } else {
	        $from_day = date("d", strtotime($filter_from));
	        $from_month = date("m", strtotime($filter_from));
	        $to_day = date("d", strtotime($filter_to));
	        $to_month = date("m", strtotime($filter_to));
        }

		$birthday_arr = [];

        $city = '';
        $customer = Customer::with(['surname_gautra' => function ($query) {
								$query->select('id','name');
							}])
							->select('avtar_url', 'first_name', 'phone_no', 'date_of_anniversary', 'id', 'surname_id', 'father_husband_name')
                            ->whereNotNull('first_name')
                            ->whereNotNull('date_of_anniversary');

        if ($request->has('city') && $request->city != '') {
            $customer = $customer->where('city_id', $request->city);
            $city = $request->city;
        }

        $customer = $customer->whereMonth('date_of_anniversary', '>=', $from_month)
                                ->whereMonth('date_of_anniversary', '<=', $to_month)
                                ->whereDay('date_of_anniversary', '>=', $from_day)
                                ->whereDay('date_of_anniversary', '<=', $to_day);

        $customer = $customer->orderBy('first_name')->latest('id')->get();

		foreach($customer as $cust) {
			$birthday_arr[] = [
				'avtar_url' => $cust->avtar_url,
				'first_name' => $cust->first_name,
				'middle_name' => $cust->father_husband_name,
				'surname' => !empty($cust->surname_gautra->name) ? $cust->surname_gautra->name : '',
				'phone_no' => $cust->phone_no,
                // 'date_of_anniversary' => date("Y").'-'.date("m-d",strtotime($cust->date_of_anniversary)),
				'date_of_anniversary' => $cust->date_of_anniversary,
				'id' => $cust->id
			];
		}

        $family_member = FamilyMember::with(['customer.surname_gautra' => function ($query) {
										$query->select('id','name');
									}])
									->select('id', 'avtar as avtar_url', 'cust_id', 'phone_no', 'date_of_anniversary', 'name as first_name')
                                    ->whereNotNull('name')
                                    ->whereNotNull('date_of_anniversary');

        if ($request->has('city') && $request->city != '') {
            $family_member = $family_member->whereHas('customer', function($query) use($request) {
                $query->where('city_id', $request->city);
            });
        }

        $family_member = $family_member->whereMonth('date_of_anniversary', '>=', $from_month)
                                        ->whereMonth('date_of_anniversary', '<=', $to_month)
                                        ->whereDay('date_of_anniversary', '>=', $from_day)
                                        ->whereDay('date_of_anniversary', '<=', $to_day);

        $family_member = $family_member->orderBy('name')->latest('id')->get();
		// dd($family_member);

		foreach($family_member as $fam) {
			$birthday_arr[] = [
				'avtar_url' => $fam->avtar_url,
				'first_name' => $fam->first_name,
				'middle_name' => '',
				'surname' => !empty($cust->surname_gautra->name) ? $cust->surname_gautra->name : '',
				'phone_no' => $fam->phone_no,
				// 'date_of_anniversary' => date("Y").'-'.date("m-d",strtotime($fam->date_of_anniversary)),
                'date_of_anniversary' => $fam->date_of_anniversary,
				'id' => $fam->id
			];
		}

        //$anniversary = $customer->merge($family_member);

        return response()->json($birthday_arr);
    }
}
