<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model
{
    //
    protected $fillable = [
        'tour_id',
        'min_people',
        'max_people',
        'adult_price',
        'kids_price',
    ];
    protected $table = 'tour_prices';

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
