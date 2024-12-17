<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class unitKerjaController extends Controller
{




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required|string|max:100',
            'deskripsi_unit'=>'required|string|max:500',
            'tugas_pokok' => 'required|string|max:500',
            'uic' => 'required|string|max:100',
            'alamat' => 'required|string|max:300',
        ]);

        UnitKerja::create($validatedData);
        return redirect('/unit');
    }

    public function destroy($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $unit->delete();
        return redirect('/unit');
    }

    public function update(Request $request, $id)
{
    $unit = UnitKerja::findOrFail($id);  // Find the unit by ID
    $unit->deskripsi_unit = $request->input('deskripsi_unit');
    $unit->tugas_pokok = $request->input('tugas_pokok');
    $unit->uic = $request->input('uic');
    $unit->alamat = $request->input('alamat');
    $unit->save();  // Save the updated data

    return redirect('/unit')->with('success', 'Unit updated successfully!');
}
}
