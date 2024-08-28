<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlasData extends Model
{
    protected $table = 'alas_data';

    protected $fillable = [
        'censor',
        'unit',
        'value',
    ];
}
