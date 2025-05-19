<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDay extends Model
{
    //
    protected $fillable = [
        'tour_id',
        'day_number',
        'title',
        'content',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

}
