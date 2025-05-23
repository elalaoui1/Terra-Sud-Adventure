<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TreksHikesController extends Controller
{
    //
    public function index()
    {
        // get all tour have Treks & Randonnées section section_id
        $tours = Tour::where('section_id', 1)
                ->withMin('tourPrices', 'adult_price')
                ->get();
        //  $tours = Tour::withMin('tourPrices', 'adult_price')
        //         ->get();
        // get all tour have Treks & Randonnées section section_name
        return view('frontend.pages.Treks_Hikes',['tours' => $tours]);
    }
}
