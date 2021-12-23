<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodD;
use App\Menu;
use App\MenuFood;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $foods = Food::all()->take(6);
        $list[] = array();

        $menus = Menu::all()->take(6);

        foreach ($menus as $menu) {
            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::FindOrFail($mf->foodId);
            }
        }

        return view('menu')->with([
            'foods' => $foods,
            'menus' => $menus
        ]);
    }
}
