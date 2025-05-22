<?php

namespace App\Http\Controllers;

use App\Models\TourRequest;
use Illuminate\Http\Request;
use App\Mail\TourRequestReceived;
use Illuminate\Support\Facades\Mail;
use App\Mail\TourRequestClientNotification;

class TourRequestController extends Controller
{
    //

    public function store(Request $request)
{
    $data = $request->validate([
        'tour_id'     => 'nullable|exists:tours,id',
        'name'        => 'required|string',
        'email'       => 'required|email',
        'phone'       => 'required|string',
        'type'        => 'required|in:public,custom',
        'adult_people'=> 'required|integer',
        'kids_people' => 'nullable|integer',
        'date_from'   => 'required|date',
        'date_to'     => 'required|date',
        'country'     => 'required|string',
        'from_city'   => 'nullable|string',
        'to_city'     => 'nullable|string',
        'message'     => 'nullable|string',
    ]);

    //Format dates to 'Y-m-d'
    if (isset($data['date_from'])) {
        $data['date_from'] = \Carbon\Carbon::parse($data['date_from'])->format('Y-m-d');
    }

    if (isset($data['date_to'])) {
        $data['date_to'] = \Carbon\Carbon::parse($data['date_to'])->format('Y-m-d');
    }

    $data['status'] = 'pending';
    $data['payment_status'] = 'unpaid';

    $tourRequest = TourRequest::create($data);

    // Send email to your company
    Mail::to(config('mail.company_contact'))->send(new TourRequestReceived($tourRequest));

    // Send email to the client
    Mail::to($tourRequest->email)->send(new TourRequestClientNotification($tourRequest));


    return response()->json([
        'message' => 'Request sent successfully!',
        'data' => $tourRequest
    ]);
}

}
