<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $items = TravelPackage::with(['galleries'])->get();
        return view('pages.home',[
            "items" => $items
        ]);
    }
}
