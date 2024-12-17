<?php

namespace App\Http\Controllers;

use App\Models\TahunRoadmap;
use Illuminate\Http\Request;

class TahunRoadmapController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|max:20|unique:tahun_roadmap,tahun', // Validasi agar tidak ada tahun duplikat
        ]);

        TahunRoadmap::create([
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('/roadmap')->with('success', 'Tahun roadmap berhasil ditambahkan!');
    }
}
