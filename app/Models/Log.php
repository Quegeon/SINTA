<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id', 'activity', 'keterangan',
    ];

    // Relationship atau hubungan model Log dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

