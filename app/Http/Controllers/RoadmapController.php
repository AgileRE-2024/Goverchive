<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use App\Models\TahunRoadmap;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tahun_roadmap' => 'required|exists:tahun_roadmap,id',  // Validasi tahun_roadmap
            'uic' => 'required|exists:unit-kerja,id',  // Validasi uic
            // Validasi input lainnya
        ]);

        // Proses penyimpanan data
        $roadmap = new Roadmap();
        $roadmap->tahun_roadmap = $request->tahun_roadmap;
        $roadmap->uic = $request->uic;
        $roadmap->kategori = $request->kategori;
        $roadmap->tujuanIt = $request->tujuanIt;
        $roadmap->indikator = $request->indikator;
        $roadmap->program = $request->program;
        $roadmap->kegiatan = $request->kegiatan;
        $roadmap->baseline = $request->baseline;
        $roadmap->target = $request->target;
        $roadmap->realisasi = $request->realisasi;
        $roadmap->target_2 = $request->target_2;
        $roadmap->realisasi_2 = $request->realisasi_2;
        $roadmap->save();

        return redirect('/roadmap')->with('success', 'Roadmap created successfully!');
    }

    public function editRoadmap(Request $request, $id)
    {
        $roadmap = Roadmap::findOrFail($id);
        $roadmap->update([
            'kategori' => $request->kategori,
            'tujuanIt' => $request->tujuanIt,
            'indikator' => $request->indikator,
            'program' => $request->program,
            'kegiatan' => $request->kegiatan,
            'uic' => $request->uic,
            'baseline' => $request->baseline,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'target_2' => $request->target,
            'realisasi_2' => $request->realisasi,
        ]);

        return redirect('/roadmap')->with('success', 'Roadmap berhasil diperbarui');
    }

    public function destroyRoadmap($id)
    {
        $roadmap = Roadmap::findOrFail($id);
        $roadmap->delete();
        return redirect('/roadmap')->with('success', 'Data berhasil dihapus!');
    }

    public function storetahun(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|max:20|unique:tahun_roadmap,tahun', // Validasi agar tidak ada tahun duplikat
        ]);

        TahunRoadmap::create([
            'tahun' => $request->tahun,
        ]);

        return redirect('/roadmap')->with('success', 'Tahun roadmap berhasil ditambahkan!');
    }

    public function destroytahun(Request $request)
    {
        $tahunRoadmap = TahunRoadmap::find($request->id);

        if ($tahunRoadmap) {
            $tahunRoadmap->delete();
            return response()->json(['success' => true, 'message' => 'Tahun roadmap berhasil dihapus!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Tahun roadmap tidak ditemukan!'], 404);
        }
    }
}
