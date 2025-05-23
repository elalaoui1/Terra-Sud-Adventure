<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // get the tours data have highlights is true with min

        // $tours = Tour::where('is_highlited', true)->get();
        $tours = Tour::where('is_highlited', true)
                ->withMin('tourPrices', 'adult_price')
                ->get();
        // dd($tours);
        
        return view('frontend.home',[
            'tours' => $tours,
        ]);
    }
}
