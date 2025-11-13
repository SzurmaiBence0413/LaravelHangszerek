<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instruments extends Model
{
    /** @use HasFactory<\Database\Factories\InstrumentsFactory> */
    use HasFactory;
public $timestamps = false;
protected $guarded = ['id'];  // Csak az id mezőt tiltom le
}
