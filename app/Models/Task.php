<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'judul', 'id_project', 'pembuat', 'penerima', 'status', 'tgl_dibuat', 'deadline', 'urugensi', 'deskripsi',
    ];

    // Relationship atau hubungan model Task dengan Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }
}
