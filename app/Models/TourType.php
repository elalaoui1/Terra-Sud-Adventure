<?php

namespace App\Models;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Model;

class TourType extends Model
{
    //

    protected $fillable = [
        'name',
        'en_name',
        'es_name',
        'description',
    ];

    public function tours()
    {
    return $this->hasMany(Tour::class);
    }

}
