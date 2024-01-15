<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Surname,
	Panth,
	Patti,
	BloodGroup,
	BusinessCategory,
	Relationship,
	Group,
	UtilitiesSubCategory,
	UtilitiesCategory
};

class ManageController extends Controller
{
	public function getSurname()
	{
		return response()->json(
			Surname::orderBy('name', 'asc')->latest('id')->get()
		);
	}

	public function getPanth()
	{
		return response()->json(
			Panth::orderBy('name', 'asc')->latest('id')->get()
		);
	}

	public function getPatti()
	{
		return response()->json(
			Patti::orderBy('name', 'asc')->latest('id')->get()
		);
	}

	public function getBloodGroup()
	{
		return response()->json(
			BloodGroup::orderBy('name', 'asc')->latest('id')->get()
		);
	}

	public function getBusinessCategory()
	{
		return response()->json(
			BusinessCategory::orderBy('name', 'asc')->latest('id')->get()
		);
	}

	public function getRelationship()
	{
		return response()->json(
			Relationship::orderBy('name', 'asc')->latest('id')->get()
		);
	}

	public function getUtilitiesCategory()
	{
		return response()->json(
			// UtilitiesCategory::latest('id')->get()
			UtilitiesCategory::orderBy('name', 'asc')->latest('id')				
				->get()
		);
	}

	public function getUtilitiesSubCategory(Request $request)
	{
		$sub_category = UtilitiesSubCategory::orderBy('name', 'asc')->latest('id');

		if ($request->has('parent_id') && $request->parent_id != "") {
			$sub_category = $sub_category->where('parent_id', $request->parent_id);
		}

		$sub_category = $sub_category->get();

		return response()->json($sub_category);
	}

	public function getGroup()
	{
		return response()->json(
			Group::orderBy('name', 'asc')->latest('id')->get()
		);
	}
}
