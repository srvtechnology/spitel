<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function index()
    {
    	Artisan::call('optimize');
    	dd("Application optimize successfully");
    }
}
