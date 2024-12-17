<?php

namespace App\Exports;

use App\Models\Roadmap;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoadmapExport implements FromQuery, WithHeadings
{
    protected $year;
    protected $tahunRoadmap;


    public function __construct( $tahunRoadmap)
    {
        $this->tahunRoadmap = $tahunRoadmap;
    }

    /**
     * Query the data to be exported.
     */
    public function query()
    {
        return Roadmap::query()
        ->join('tujuan-it', 'roadmap.tujuanIt', '=', 'tujuan-it.id')
        ->join('unit-kerja', 'roadmap.uic', '=', 'unit-kerja.id')
        ->join('tahun_roadmap','roadmap.tahun_roadmap', '=', 'tahun_roadmap.id')
        ->where('roadmap.tahun_roadmap', $this->tahunRoadmap)
        ->select([
            'roadmap.kategori',
            'tahun_roadmap.tahun',
            'tujuan-it.tujuanIt', // get tujuanIt from tujuan-it table
            'roadmap.indikator',
            'roadmap.program',
            'roadmap.kegiatan',
            'unit-kerja.nama_divisi', // get nama_divisi from unit-kerja table
            'roadmap.baseline',
            'roadmap.target',
            'roadmap.realisasi',
            'roadmap.target_2',
            'roadmap.realisasi_2',
            'roadmap.created_at',
        ]);
    }

    /**
     * Define column headings.
     */
    public function headings(): array
    {
        return [
            'Kategori',
            'Tahun',
            'Tujuan IT', // added column heading for tujuanIt
            'Indikator',
            'Program',
            'Kegiatan',
            'Nama Divisi', // changed to reflect the field from unit-kerja
            'Baseline',
            'Target Tahun Ini',
            'Realisasi Tahun Ini',
            'Target Tahun Berikutnya',
            'Realisasi Tahun Berikutnya',
            'Created At',
        ];
    }
}
