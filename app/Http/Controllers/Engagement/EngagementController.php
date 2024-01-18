<?php

namespace App\Http\Controllers\Engagement;

use App\Models\City;
use App\Models\Engagement;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hidehalo\Nanoid\Client as NanoId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\Engagement\EngagementRequest;
use App\Http\Resources\Engagement\EngagementResource;

class EngagementController extends Controller
{

    public function index()
    {
        $engagements = Engagement::paginate(10);

        return view('admin.engagement.index')->with(compact('engagements'));
        // return EngagementResource::collection($engagements);
    }


    public function add(): View
    {
        $cities = City::all();
        return view('admin.engagement.add')->with(compact('cities'));
    }


    public function store(EngagementRequest $request): RedirectResponse
    {
        $nanoid = new NanoId();
        $bride_image_url = $request->file('bride_image_url')->storeAs('engagement','bride_'.$nanoid->generateId($size = 10).'.jpg','public');
        $groom_image_url = $request->file('groom_image_url')->storeAs('engagement','groom_'.$nanoid->generateId($size = 10).'.jpg','public');

        Engagement::create([
            'bride_name' => $request->input('bride_name'),
            'bride_qualification' => $request->input('bride_qualification'),
            'bride_grandparents' => $request->input('bride_grandparents'),
            'bride_parents' => $request->input('bride_parents'),
            'bride_current_city' => $request->input('bride_current_city'),
            'bride_native_city' => $request->input('bride_native_city'),
            'groom_name' => $request->input('groom_name'),
            'groom_qualification' => $request->input('groom_qualification'),
            'groom_grandparents' => $request->input('groom_grandparents'),
            'groom_parents' => $request->input('groom_parents'),
            'groom_current_city' => $request->input('groom_current_city'),
            'groom_native_city' => $request->input('groom_native_city'),
            'bride_image_url' => $bride_image_url,
            'groom_image_url' => $groom_image_url,
        ]);

        return redirect()->route('engagements.add');
    }

    public function view($id)
    {
        $engagement = Engagement::findOrFail($id);

        return view('admin.engagement.detail')->with(compact('engagement'));
    }

    public function engagements_ajax_search(Request $request)
    {
        $row = [];
        $engagements = Engagement::orderBy('id', 'DESC')
        ->where(function($query) use ($request) {
            $query->where('bride_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('groom_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('bride_current_city', 'LIKE', '%' . $request->search . '%')
                ->orWhere('groom_current_city', 'LIKE', '%' . $request->search . '%');
        })->get();
        foreach($engagements as $row)
        {
            if(Auth::user()->is_view)
            {
                $row['is_view'] = true;
                $row['is_view_url'] = url('/admin/engagements/view/'.$row->id.'?city='.request('city'));
            }
        }

        return $engagements;;
    }
}
