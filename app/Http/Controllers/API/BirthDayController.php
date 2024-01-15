<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Customer,
	FamilyMember	
};

class BirthDayController extends Controller
{
    public function index(Request $request)
    {
		$filter_from = date("Y-m-d", strtotime('first day of this month'));
        $filter_to = date("Y-m-d", strtotime('last day of this month'));

        $from_day = date("d", strtotime($filter_from));
        $from_month = date("m", strtotime($filter_from));

        $to_day = date("d", strtotime($filter_to));
        $to_month = date("m", strtotime($filter_to));

        if ($request->has('from_day') && $request->from_day != "" && $request->has('from_month') && $request->from_month != '' && $request->has('to_day') && $request->to_day != "" && $request->has('to_month') && $request->to_month != "") {
	        $from_day = $request->from_day;
	        $from_month = $request->from_month;
	        $to_day = $request->to_day;
	        $to_month = $request->to_month;        	
        }
		
		$birthday_arr = [];

//        $customer = Customer::select('id', 'first_name', 'phone_no', 'date_of_birth', 'avtar_url', 'father_husband_name', 'surname_id')
        $customer = Customer::with(['surname_gautra' => function ($query) {
								$query->select('id','name');
							}])->select('id', 'first_name', 'phone_no', 'date_of_birth', 'avtar_url', 'father_husband_name', 'surname_id')
                            ->whereMonth('date_of_birth', '>=', $from_month)
                            ->whereMonth('date_of_birth', '<=', $to_month)
                            ->whereDay('date_of_birth', '>=', $from_day)
                            ->whereDay('date_of_birth', '<=', $to_day)
                            ->whereNotNull('date_of_birth')
                            ->whereNotNull('first_name');

        if ($request->has('city') && $request->city != '') {
            $customer = $customer->where('city_id', $request->city);
        }

        $customer = $customer->orderBy('first_name')->latest('id')->get();
		// dd($customer);
		
		foreach($customer as $cust) {
			// dd($cust);
			$birthday_arr[] = [
				'avtar_url' => $cust->avtar_url,
				'first_name' => $cust->first_name,
				'middle_name' => $cust->father_husband_name,
				'surname' => !empty($cust->surname_gautra->name) ? $cust->surname_gautra->name : '',
				'phone_no' => $cust->phone_no,
				'date_of_birth' => $cust->date_of_birth,
				'id' => $cust->id
			];
		}

        $family_member = FamilyMember::with(['customer.surname_gautra' => function ($query) {
										$query->select('id','name');
									}])
									->select('id', 'cust_id', 'name as first_name', 'phone_no', 'date_of_birth', 'avtar as avtar_url')
                                        // ->whereBetween('date_of_birth', [$filter_from, $filter_to])
                                        ->whereMonth('date_of_birth', '>=', $from_month)
                                        ->whereMonth('date_of_birth', '<=', $to_month)
                                        ->whereDay('date_of_birth', '>=', $from_day)
                                        ->whereDay('date_of_birth', '<=', $to_day)
                                        ->whereNotNull('date_of_birth')
                                        ->whereNotNull('name');

        if ($request->has('city') && $request->city != '') {
            $family_member = $family_member->whereHas('customer', function($query) use($request){
                $query->where('city_id', $request->city);
            });
        }

        $family_member = $family_member->orderBy('name')->latest('id')->get();
		// dd($family_member);
		
		foreach($family_member as $fam) {
			$birthday_arr[] = [
				'avtar_url' => $fam->avtar_url,
				'first_name' => $fam->first_name,
				'middle_name' => '',
				'surname' => !empty($fam->customer->surname_gautra->name) ? $fam->customer->surname_gautra->name : '',
				'phone_no' => $fam->phone_no,
				'date_of_birth' => $fam->date_of_birth,
				'id' => $fam->id
			];
		}

        // $birthday = $customer->merge($family_member);

        return response()->json($birthday_arr);
    }
}
