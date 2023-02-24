<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role_id == 1){
                $request->session()->regenerate();
                return redirect('dashboard');

            }elseif(Auth::user()->role_id == 2){
                $request->session()->regenerate();
                return redirect('dashboard');

            }elseif(Auth::user()->role_id == 3){
                $request->session()->regenerate();
                return redirect('dashboard');
            }
            
        }

        $request->session()->flash('status', 'Login Failed, Please check Email or Password');
        $request->session()->flash('alert-class', 'alert-danger');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required',
            'no_induk' => 'required',
        ]);
        
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->role_id = $request->role_id;
        $user->save();
        // $request['password'] = Hash::make($request->password); 
        // $user = User::create($request->all());

        if($request->role_id == 2){
            $dosen = new Dosen();
            $dosen->id_user = $user->id;
            $dosen->nidn = $request->no_induk;
            $dosen->save();

        }
        elseif($request->role_id == 3){
            $mahasiswa = new Mahasiswa();
            $mahasiswa->id_user = $user->id;
            $mahasiswa->nim = $request->no_induk;
            $mahasiswa->save();
        }

        $request->session()->flash('status', 'Account Successfully Registered');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect('login');
    }
}
