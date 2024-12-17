<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Roadmap extends Model
{
    use HasFactory;
    protected $table = 'roadmap';

    protected $primaryKey = 'id';

    protected $fillable = [
      'tahun_roadmap','kategori','tujuanIt','indikator','program','kegiatan','uic','baseline','target',
      'realisasi','target_2','realisasi_2','created_at'
    ];

    public function tahunRoadmap()
    {
        return $this->belongsTo(TahunRoadmap::class, 'id');
    }

    public function tujuanIts(): BelongsTo
    {
        return $this->belongsTo(TujuanIt::class, 'tujuanIt','id');
    }

    public function unitKerja(): BelongsTo
    {
        return $this->belongsTo(UnitKerja::class, 'uic','id');
    }
}
