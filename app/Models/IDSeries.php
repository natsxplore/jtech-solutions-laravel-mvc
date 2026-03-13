<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IDSeries extends Model
{
    protected $table = 'id_series';

    protected $fillable = [
        'code',
        'series_value',
    ];

    protected $casts = [
        'series_value' => 'integer',
    ];
}
