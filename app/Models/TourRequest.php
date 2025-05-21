<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    //
    protected $fillable = [
        'tour_id',
        'name',
        'email',
        'phone',
        'type',
        'adult_people',
        'kids_people',
        'date_from',
        'date_to',
        'country',
        'from_city',
        'to_city',
        'message',
        'status',
        'payment_status',
    ];
    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date',
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
