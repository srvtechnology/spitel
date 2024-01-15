<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    //
    public function change(Request $request){
        // dd($request->lang);
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        if($request->lang == 'ar'){
            session()->put('class-po', 'direction-rtl');
            session()->put('dir-po', 'rtl');
        }
        return redirect()->back();

    }
}
