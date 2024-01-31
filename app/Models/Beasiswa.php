<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    public $incrementing = true;
    // database beasiswa
    protected $table = 'beasiswa';
    // memproteksikan data yang masuk
    protected $guarded = [];
}
