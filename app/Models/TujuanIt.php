<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TujuanIt extends Model
{
    use HasFactory;

    protected $table = 'tujuan-it';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'dimensi','tujuanorganisasi_id','tujuanIt'
    ];

    public function tujuanorganisasi(): BelongsTo
    {
        return $this->belongsTo(TujuanOrganisasi::class, 'tujuanorganisasi_id', 'id');
    }
}
