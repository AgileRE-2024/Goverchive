<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit-kerja';
    protected $primaryKey = 'id';


    protected $fillable = [
        'nama_divisi',
        'deskripsi_unit',
        'tugas_pokok',
        'uic',
        'alamat',
    ];

    public $timestamps = false;
}
