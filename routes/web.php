<?php

use App\Models\TourRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/emaill', function () {
    // Get an existing TourRequest from DB (adjust ID as needed)
    $tourRequest = TourRequest::with(['tour.startLocation', 'tour.endLocation', 'tour.section'])->find(1); // Change 1 to a valid ID
    // dd($tourRequest);
    if (!$tourRequest) {
        abort(404, "TourRequest not found.");
    }

    return view('emails.tour-request-received', compact('tourRequest'));
});
