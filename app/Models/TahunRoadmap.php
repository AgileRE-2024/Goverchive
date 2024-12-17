<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunRoadmap extends Model
{
    use HasFactory;

    protected $table = 'tahun_roadmap';

    protected $fillable = [
        'tahun',
    ];

    /**
     * Relasi one-to-many dengan tabel roadmap
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class, 'id');
    }
}
