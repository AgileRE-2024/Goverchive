<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use App\Models\TahunRoadmap;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => ['required','max:200','string'],
            'tujuanIt' => ['required','max:100','integer'],
            'indikator' => ['required','max:200','string'],
            'program'=>['required','max:300','string'],
            'kegiatan' => ['required','max:300','string'],
            'uic' => ['required','max:100','integer'],
            'baseline' => ['required','max:400','string'],
            'target' => ['required','max:400','string'],
            'realisasi' => ['required','max:400','string'],
            'target_2' => ['required','max:400','string'],
            'realisasi_2' => ['required','max:400','string'],
            'tahun_roadmap' => ['required','max:20','integer'],
        ]);

        Roadmap::create($validatedData);
        return redirect('/roadmap');
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
