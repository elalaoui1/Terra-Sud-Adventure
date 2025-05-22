<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // get the tours data have highlights is true
        $tours = Tour::where('is_highlited', true)->get();
        // dd($tours);
        // $tours = \App\Models\Tour::with('highlights')->get();
        return view('frontend.home',[
            'tours' => $tours,
        ]);
    }
}
