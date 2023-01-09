<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select('id')->get()->count();
        $ujian = Ujian::select('id')->get()->count();
        $mahasiswa = User::whereHas('roles', function($q){
            $q->where('name', 'Mahasiswa');
        })->select('id')->count();
        $dosen = User::whereHas('roles', function($q){
            $q->where('name', 'Dosen');
        })->select('id')->count();
        return view('home', compact('user', 'ujian', 'mahasiswa','dosen'));
    }
}
