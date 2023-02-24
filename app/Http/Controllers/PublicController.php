<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        // $rent_logs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('dashboard');
    }
}
