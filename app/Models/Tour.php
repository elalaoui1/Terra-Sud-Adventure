<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'description',
        'overview',
        'duration_days',
        'main_image',
        'gallery_images',
        'start_location_id',
        'end_location_id',
        'is_highlited',
        'Difficulties',
        'tour_type_id',
        'section_id',
    ];
    protected $casts = [
        'gallery_images' => 'array',
    ];
    public function tourType()
    {
        return $this->belongsTo(TourType::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function startLocation()
    {
        return $this->belongsTo(Location::class, 'start_location_id');
    }
    public function endLocation()
    {
        return $this->belongsTo(Location::class, 'end_location_id');
    }
    public function tourPrices()
    {
        return $this->hasMany(TourPrice::class, 'tour_id');
    }
    public function tourDays()
    {
        return $this->hasMany(TourDay::class, 'tour_id');
    }
    public function exInCludes()
    {
        return $this->belongsToMany(ExInClude::class, 'ex_in_clude_tours')
            ->withPivot('type')
            ->withTimestamps();
    }

    public function includes()
    {
        return $this->exInCludes()->wherePivot('type', 'include');
    }

    public function excludes()
    {
        return $this->exInCludes()->wherePivot('type', 'exclude');
    }



    protected static function booted()
{
     static::creating(function ($model) {
        if (empty($model->slug)) {
            $slugBase = Str::slug($model->name);
            $randomPart = Str::uuid()->toString(); // يعطي UUID كامل
            $shortUuid = substr($randomPart, 0, 8); // نأخذ جزء قصير فقط

            $model->slug = $slugBase . '-' . $shortUuid;

            // نزيد تأكيد الفريدية
            while (static::where('slug', $model->slug)->exists()) {
                $shortUuid = substr(Str::uuid()->toString(), 0, 8);
                $model->slug = $slugBase . '-' . $shortUuid;
            }
        }
    });

    static::updating(function ($model) {
        if (empty($model->slug)) {
            $slugBase = Str::slug($model->name);
            $shortUuid = substr(Str::uuid()->toString(), 0, 8);

            $model->slug = $slugBase . '-' . $shortUuid;

            while (
                static::where('slug', $model->slug)->where('id', '!=', $model->id)->exists()
            ) {
                $shortUuid = substr(Str::uuid()->toString(), 0, 8);
                $model->slug = $slugBase . '-' . $shortUuid;
            }
        }
    });
}

}
