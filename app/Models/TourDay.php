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

    public function translations()
    {
        return $this->hasMany(TranslateLanguage::class,'tour_day_id');
    }

    public function translation($lang = 'en')
    {
        return $this->hasOne(TranslateLanguage::class)
                    ->where('lang_code', $lang);
    }
}
