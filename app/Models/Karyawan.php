<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama', 'role', 'username', 'password', 'no_telp', 'kinerja', 'jumlah_tugas_selesai',
    ];
}

