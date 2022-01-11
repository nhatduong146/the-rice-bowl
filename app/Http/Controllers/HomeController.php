<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $evas = DB::table('evaluates')
            ->join('users', 'evaluates.userID', '=', 'users.id')
            ->select('users.fullName','createdDate', 'numberStar', 'content', 'avatarUrl')
            ->orderBy('createdDate', 'desc')
            ->paginate(2);
        if(isset(Auth::user()->email)) {
            $email = Auth::user()->email;
            $user = DB::table('users')->where('email', $email)->first();
            Session::put('idUser', $user->id);  
            return view('home')->with('list_evas', $evas);
        }
    }
}
