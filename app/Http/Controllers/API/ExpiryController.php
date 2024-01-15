<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    FamilyMember,
    News
};

class ExpiryController extends Controller
{

    public function getExpiry(Request $request)
    {
        if(isset($request->date)){

            $date = $request->date;

        }else{
            $date = date('m-d');
        }


        $family_members = FamilyMember::join('customers', 'customers.id', '=', 'family_member.cust_id')
            // if $request->city_id is not null then add where condition
                ->when($request->city_id, function($query) use($request) {
                    $query->where('customers.city_id', $request->city_id);
                })
            ->whereRaw('DATE_FORMAT(family_member.date_of_expire, "%m-%d") = ?', [$date])
                ->select('family_member.*','customers.city_id')
				->orderBy('name')
                ->get();

        $result = array();
        foreach($family_members as $family_member) {
            $current_year = date('Y');

            $expiry_year = date('Y',strtotime($family_member->date_of_expire));

            $diff = $current_year - $expiry_year ;

            if($diff > 0){
                $family_member->years_of_expiry = $diff;

                $result[] = $family_member;

            }
        }


            return response()->json(['members'=>$result],'200');


    }



}
