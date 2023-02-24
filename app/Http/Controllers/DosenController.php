<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with(['user'])->get();
        $users = User::where('role_id', 2)->get();
        return view('dosen-list', ['dosens' => $dosens, 'users' => $users]);
    }
    
    public function detail($id)
    {
        $matakuliahs = MataKuliah::with(['dosen'])->where('id_dosen', $id)->get();
        $dosen = Dosen::with(['user'])->where('id', $id)->first();
        return view('dosen-detail', ['matakuliahs' => $matakuliahs, 'dosen' => $dosen]);
    }

    public function profileDosen()
    {
        $id = Auth::user()->id;
        $idDosen = DB::table('dosens')->where('id_user', $id)->value('id');
        $dosen = Dosen::with(['user'])->where('id', $idDosen)->first();
        return view('dosen-profile', ['dosen' => $dosen]);
    }

    public function profileUpdate(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:users|max:255',
        //     'nim' => 'required|unique:mahasiswas|max:255',
        // ]);
        $id = Auth::user()->id;
        $idDosen = DB::table('dosens')->where('id_user', $id)->value('id');
        $dosen = Dosen::with(['user'])->where('id', $idDosen)->first();
        
        $user =  User::where('id',$id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($user->save())
            $dosen->nidn = $request->input('nidn');
            $dosen->save();
            return redirect('profile-dosen')->with('status', 'Your info are updated');
    }

    public function matkulDosen()
    {
        $id = Auth::user()->id;
        $idDosen = DB::table('dosens')->where('id_user', $id)->value('id');
        $dosen = Dosen::with(['user'])->where('id', $idDosen)->first();
        $matakuliahs = MataKuliah::with(['dosen'])->where('id_dosen', $idDosen)->get();

        return view('dosen-matkul', ['matakuliahs' => $matakuliahs, 'dosen' => $dosen]);
    }

    public function detailMatkul($id)
    {
        $id = Auth::user()->id;
        $idDosen = DB::table('dosens')->where('id_user', $id)->value('id');
        $dosen = Dosen::with(['user'])->where('id', $idDosen)->first();
        $matakuliahs = MataKuliah::with(['dosen'])->where('id_dosen', $idDosen)->get();

        return view('dosen-matkul', ['matakuliahs' => $matakuliahs, 'dosen' => $dosen]);
    }

}
