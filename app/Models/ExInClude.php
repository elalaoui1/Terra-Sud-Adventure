<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExInClude extends Model
{
    //
    protected $fillable = [
        'name',
        'en_name',
        'es_name',
    ];

    protected $table = 'ex_in_cludes';
    public function tours()
{
    return $this->belongsToMany(Tour::class, 'ex_in_clude_tours');
}


}
