<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function staffHome()
    {
        $dataUser = auth()->user();
        return view('user.index', compact('dataUser'));
    }

    public function managerHome()
    {
        $divisis = Divisi::all();
        $dataUser = User::where('role', '!=', 'superadmin')->get();
        $dataSuperAdmin = auth()->user();
        return view('manager.index', compact('dataSuperAdmin', 'divisis', 'dataUser'));
    }

    public function superadminHome()
    {
        $divisis = Divisi::all();
        $dataUser = User::where('role', '!=', 'superadmin')->get();
        $dataSuperAdmin = auth()->user();
        return view('superadmin.index', compact('dataSuperAdmin', 'divisis', 'dataUser'));
    }
}
