<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unitUtama extends Model
{
    use HasFactory;

    protected $table = 'visi-misi';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'visi',
        'misi',
        'tujuan',
    ];

    public $timestamps = false;
}
