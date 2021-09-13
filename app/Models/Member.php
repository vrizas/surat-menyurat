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
        'jenisKelamin',
        'tempatLahir',
        'tanggalLahir',
        'agama',
        'status',
        'negara',
        'pendidikan',
        'pekerjaan',
        'noKk',
        'rt',
        'rw',
        'alamat',
        'keperluan',
    ];
}
