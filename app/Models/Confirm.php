<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_nik',
        'tujuan',
        'keperluan',
        'keterangan',
        'jenisSurat',
        'aparat_nik',
    ];
}
