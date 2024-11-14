<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanOrganisasi extends Model
{
    use HasFactory;
    protected $table = 'tujuan-organisasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['dimensi','egoal','tujuan-organisasi'];

    public function tujuanIt(){
        return $this ->hasMany(TujuanIt::class);
    }
}
