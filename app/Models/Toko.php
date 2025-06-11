<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'tokos';
    protected $fillable = [
        'nama_toko',
        'alamat',
        'nomor_telpon',
    ];
}
