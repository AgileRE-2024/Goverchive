<?php

namespace App\Http\Controllers;

use App\Models\TujuanIt;
use App\Models\unitUtama;
use App\Models\TujuanOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class unitUtamaController extends Controller
{
    public function index()
{
    $unitUtama = unitUtama::first();
    $allTujuanOrganisasi = TujuanOrganisasi::all(); // Get all records for display
    $tujuanorganisasi = null;  // No record for create, so set it to null
    $allTujuanIt = TujuanIt::with('tujuanOrganisasi')->get();  // Make sure you're retrieving this data
    $tujuanit = TujuanIt::first(); // Set to null for create or get the first record

    return view('organisasi', [
        'unitUtama' => $unitUtama,
        'tujuanorganisasi' => $tujuanorganisasi, // Pass null for create
        'allTujuanOrganisasi' => $allTujuanOrganisasi, // All records for display
        'allTujuanIt' => $allTujuanIt, // Make sure to pass allTujuanIt to the view
        'tujuanit' => $tujuanit,
    ]);
}

public function edit($id)
{
    $tujuanorganisasi = TujuanOrganisasi::find($id);
    if (!$tujuanorganisasi) {
        return redirect()->route('organisasi.index')->with('error', 'Data not found.');
    }

    $unitUtama = unitUtama::first();
    $allTujuanOrganisasi = TujuanOrganisasi::all();

    return view('organisasi', [
        'unitUtama' => $unitUtama,
        'tujuanorganisasi' => $tujuanorganisasi, // Pass record for editing
        'allTujuanOrganisasi' => $allTujuanOrganisasi,
    ]);
}
    public function storeVisiMisi(Request $request)
    {
        $validatedData = $request->validate([
            'visi' => 'string|max:500',
            'misi' => 'string|max:500',
        ]);

        unitUtama::create($validatedData);

        return redirect('/organisasi')->with('success', 'Visi dan Misi berhasil ditambahkan');
    }

    public function storeTujuan(Request $request)
    {
        $validatedData = $request->validate([
            'dimensi' => ['required','max:100','string'],
            'egoal' => ['required','max:100','string'],
            'tujuan-organisasi' => ['required','max:500','string'],
        ]);

        TujuanOrganisasi::create($validatedData);

        return redirect('/organisasi')->with('success', 'Tujuan berhasil ditambahkan');
    }

    public function updateVisiMisi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'visi' => 'string|max:500',
            'misi' => 'string|max:500',
        ]);

        $unitUtama = unitUtama::findOrFail($id);
        $unitUtama->update($validatedData);

        return redirect('/organisasi')->with('success', 'Visi dan Misi berhasil diperbarui');
    }

    public function updateTujuan(Request $request, $id)
    {

        $tujuanorganisasi = TujuanOrganisasi::findOrFail($id);
        $tujuanorganisasi->update([
        'dimensi' => $request->dimensi,
        'egoal' => $request->egoal,
        'tujuan-organisasi' => $request->{'tujuan-organisasi'},
        ]);

        return redirect('/organisasi')->with('success', 'Tujuan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $unitUtama = unitUtama::find($id);

        if ($unitUtama) {
            $unitUtama->delete();
            return redirect('/organisasi')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect('/organisasi')->with('error', 'Data tidak ditemukan.');
        }
    }


    public function destroyTujuanOrganisasi($id)
    {
        $tujuanorganisasi = TujuanOrganisasi::findOrFail($id);

        if ($tujuanorganisasi) {
            $tujuanorganisasi->delete();
            return redirect('/organisasi')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect('/organisasi')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function storeTujuanIt(Request $request)
    {
        $validatedData = $request->validate([
            'dimensi' => ['required','max:100','string'],
            'tujuanorganisasi_id' => ['required','max:100','integer'],
            'tujuanIt' => ['required','max:500','string'],
        ]);

        TujuanIt::create($validatedData);

        return redirect('/organisasi')->with('success', 'Tujuan berhasil ditambahkan');
    }

    public function editTujuanIt(Request $request, $id)
    {
        $tujuanIt = TujuanIt::findOrFail($id);
        $tujuanIt->update([
        'dimensi' => $request->dimensi,
        'tujuanorganisasi_id' => $request->tujuanorganisasi_id,
        'tujuanIt' => $request->tujuanIt,
    ]);
        return redirect('/organisasi')->with('success', 'Visi dan Misi berhasil diperbarui');
    }

    public function destroyTujuanIt($id)
    {
        $tujuanIt = TujuanIt::findOrFail($id);
        $tujuanIt->delete();
        return redirect('/organisasi')->with('success', 'Data berhasil dihapus!');
    }


}


