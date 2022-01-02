<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Alert;
// use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
// use RealRashid\SweetAlert\ToSweetAlert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
}
