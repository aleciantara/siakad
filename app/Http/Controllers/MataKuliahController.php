<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\MatkulMahasiswa;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = MataKuliah::with(['dosen'])->get();
        $dosens = Dosen::with(['user'])->get();
        return view('matakuliah-list', ['matakuliahs' => $matakuliahs, 'dosens' => $dosens]);
    }
    
    public function add()
    {
        $matakuliahs = MataKuliah::with(['dosen'])->get();
        $dosens = Dosen::with(['user'])->get();
        return view('matakuliah-add', ['matakuliahs' => $matakuliahs, 'dosens' => $dosens]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'id_dosen'        => 'required|'
        ]);
        $matakuliah = MataKuliah::create($request->all());

        $matakuliahs = MataKuliah::with(['dosen'])->get();
        $dosens = Dosen::with(['user'])->get();
        return view('matakuliah-list', ['matakuliahs' => $matakuliahs, 'dosens' => $dosens]);
    }

    public function edit($id)
    {
        $matakuliah = MataKuliah::with(['dosen'])->where('id', $id)->first();
        // dd($matakuliah);
        $dosens = Dosen::with(['user'])->get();
        return view('matakuliah-edit', ['matakuliah' => $matakuliah, 'dosens' => $dosens]);
    }

    
    public function update(Request $request, $id){
        $matakuliah = MataKuliah::where('id', $id)->first();
        $matakuliah->update($request->all());

        return redirect('matakuliah')->with('status', 'Mata Kuliah Berhasil Di-update');
    }

    public function delete($id)
    {
        $matakuliah = matakuliah::where('id', $id)->first();
        $matakuliah->delete();
        return redirect('matakuliah')->with('status', 'Matakuliah Berhasil Dihapus');
    }

    public function detailMatkul($id)
    {
        $matakuliah = matakuliah::with(['dosen'])->where('id', $id)->first();
        $mahasiswas = Mahasiswa::with(['user'])->whereIn('id', function($query) use($id){
            $query->select('id_mahasiswa')
            ->from(with(new MatkulMahasiswa)->getTable())
            ->where('id_matkul', '=', $id);
        })->get();
        // dd($mahasiswas);
        return view('matakuliah-detail',['matakuliah' => $matakuliah,  'mahasiswas' => $mahasiswas]);
    }

}
