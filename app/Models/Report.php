<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'member_nik',
        'noRegister',
        'tanggal',
        'tujuan',
        'keperluan',
        'keterangan',
        'jenisSurat',
        'admin_nik',
    ];
}
