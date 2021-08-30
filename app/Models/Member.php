<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jenis-kelamin',
        'ttl',
        'agama',
        'status',
        'negara',
        'pendidikan',
        'pekerjaan',
        'no-kk',
        'rt',
        'rw',
        'alamat',
        'keperluan',

        
        

    ];
}
