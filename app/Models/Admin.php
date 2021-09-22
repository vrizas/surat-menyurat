<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'jabatan',
        'rt',
        'rw',
        'no-telp',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
