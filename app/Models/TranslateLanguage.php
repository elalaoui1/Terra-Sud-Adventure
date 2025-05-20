<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslateLanguage extends Model
{
    //
    protected $fillable = [
        'tour_id',
        'tour_day_id',
        'name',
        'lang_code',
        'description',
        'overview',
        'title',
        'content',
    ];
    protected $table = 'translate_langauges';

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    
    public function tourDay()
    {
        return $this->belongsTo(TourDay::class);
    }
}
