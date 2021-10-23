<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_nik',
        'kode_surat',
        'tanggal',
        'keterangan',
        'jenisSurat',
        'aparat_nik',
    ];
}
