<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'beasiswa';
    // protected $fillable = [
    //     'nama',
    //     'email',
    //     'nomer_hp',
    //     'semester',
    //     'ipk_terakhir',
    //     'pilihan_beasiswa',
    //     'upload_berkas',
    // ];
    protected $guarded = [];
}
