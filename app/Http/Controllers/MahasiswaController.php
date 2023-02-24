<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\MatkulMahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['user'])->get();
        $users = User::where('role_id', 3)->get();
        return view('mahasiswa-list', ['mahasiswas' => $mahasiswas, 'users' => $users]);
    }
    
    public function detail($id)
    {
        $matakuliahs = MataKuliah::with(['dosen'])->whereIn('id', function($query) use($id){
            $query->select('id_matkul')
            ->from(with(new MatkulMahasiswa)->getTable())
            ->where('id_mahasiswa', '=', $id);
        })->get();
        $mahasiswa = Mahasiswa::with(['user'])->where('id', $id)->first();
        return view('mahasiswa-detail', ['mahasiswa' => $mahasiswa, 'matakuliahs' => $matakuliahs]);
    }

    public function profileMahasiswa()
    {
        $id = Auth::user()->id;
        $idMahasiswa = DB::table('mahasiswas')->where('id_user', $id)->value('id');
        $mahasiswa = Mahasiswa::with(['user'])->where('id', $idMahasiswa)->first();
        return view('mahasiswa-profile', ['mahasiswa' => $mahasiswa]);
    }

    public function profileUpdate(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:users|max:255',
        //     'nim' => 'required|unique:mahasiswas|max:255',
        // ]);
        $id = Auth::user()->id;
        $idMahasiswa = DB::table('mahasiswas')->where('id_user', $id)->value('id');
        $mahasiswa = Mahasiswa::with(['user'])->where('id', $idMahasiswa)->first();
        
        $user =  User::where('id',$id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($user->save())
        
            $mahasiswa->nim = $request->input('nim');
            $mahasiswa->save();
            
            return redirect('profile-mahasiswa')->with('status', 'Your info are updated');

    }
        
    

    public function matkulMahasiswa()
    {
        $id = Auth::user()->id;
        $idMahasiswa = DB::table('mahasiswas')->where('id_user', $id)->value('id');

        $matakuliahs = MataKuliah::with(['dosen'])->whereNotIn('id', function($query) use ($idMahasiswa){
            $query->select('id_matkul')
            ->from(with(new MatkulMahasiswa)->getTable())
            ->where('id_mahasiswa', '=', $idMahasiswa);
        })->get();
        $dosens = Dosen::with(['user'])->get();
        $matkulMahasiswa = MatkulMahasiswa::with(['mahasiswa', 'matakuliah'])->where('id_mahasiswa', $idMahasiswa)->get();
        return view('mahasiswa-matakuliah', ['matakuliahs' => $matakuliahs, 'matkulMahasiswa' => $matkulMahasiswa]);
    }

    public function ambilMatkul($idMatkul)
    {
        $idUser = Auth::user()->id;
        $idMahasiswa = DB::table('mahasiswas')->where('id_user', $idUser)->value('id');

        $matkul = new MatkulMahasiswa();
            $matkul->id_matkul = $idMatkul;
            $matkul->id_mahasiswa = $idMahasiswa;
            $matkul->save();

        return redirect('matkul-mahasiswa')->with('status', 'Mata Kuliah Berhasil Ditambahkkan');
    }

    public function batalMatkul($id)
    {
        $matkulMahasiswa = MatkulMahasiswa::where('id', $id)->first();
        $matkulMahasiswa->delete();
        return redirect('matkul-mahasiswa')->with('status', 'Mata Kuliah Berhasil Dibatalkan');
    }
}
