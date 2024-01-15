<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class LanguageController extends Controller
{
    //
    public function arabic(Request $request){
        // dd($request->name);
      
        $lng = App::setLocale($request->name);
        session()->put('locale', $lng);
        // if($request->lang == 'ar'){
            session()->put('class-po', 'direction-rtl');
            session()->put('dir-po', 'rtl');
        // }
      
        return redirect()->back();

    }
    public function english(Request $request){
        // dd($request->name);
         $lng = App::setLocale($request->name);

        session()->put('locale',$lng);
        // if($request->lang == 'ar'){
        //     session()->put('class-po', 'direction-rtl');
        //     session()->put('dir-po', 'rtl');
        // }
        // if($request->lang == 'en'){
            session()->put('class-po', 'direction-ltr');
            session()->put('dir-po', 'ltr');
        // }
        
        return redirect()->back();

    }
}
