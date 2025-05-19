<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    protected $table = 'sections';
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
