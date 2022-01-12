<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
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
            ->select('users.fullName', 'createdDate', 'numberStar', 'content', 'avatarUrl')
            ->orderBy('createdDate', 'desc')
            ->paginate(2);

        $restaurant = Restaurant::findOrFail(1);

        if (isset(Auth::user()->email)) {
            $email = Auth::user()->email;
            $user = DB::table('users')->where('email', $email)->first();
            Session::put('idUser', $user->id);
            return view('home')->with('list_evas', $evas)->with('restaurant', $restaurant);
        }
    }

    public function show()
    {
        $restaurant = Restaurant::findOrFail(1);
        return view('admin.information_ui.information')->with('restaurant', $restaurant);
    }


    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $data = $request->all();

        if ($data['food_banner']) {
            $data['food_banner'] = 'public/front-end/images/' . $data['food_banner'];
        } else {
            $data['food_banner'] = $restaurant->food_banner;
        }

        if ($data['menu_banner']) {
            $data['menu_banner'] = 'public/front-end/images/' . $data['menu_banner'];
        } else {
            $data['menu_banner'] = $restaurant->menu_banner;
        }

        $restaurant->update($data);

        return redirect('/admin/information')->with('status', 'Cập nhật thành công!');
    }
}
