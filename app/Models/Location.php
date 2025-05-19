<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    protected $table = 'locations';
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }


}
