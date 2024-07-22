<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [
        'foto', 'nama', 'role', 'username', 'password', 'no_telp', 'kinerja', 'jumlah_tugas_selesai',
    ];
}


