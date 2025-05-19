<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExInCludeTour extends Model
{
    //
    protected $fillable = [
        'tour_id',
        'ex_in_clude_id',
        'type',
    ];
    protected $table = 'ex_in_clude_tours';
}
