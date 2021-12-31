<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\MenuFood;
use App\Models\Food;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $order = new Order;
        $order->organizationDate = $request->organizationDate;
        $order->peopleNumber = $request->peopleNumber;
        $order->serviceId = $request->serviceId;
        $order->menuId = $request->menuId;
        $order->note = $request->note;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createOrder(Request $request)
    {
        //
        $order = new Order;
        $order->organizationDate = $request->organizationDate;
        $order->peopleNumber = $request->peopleNumber;
        $order->serviceId = $request->serviceId;
        $order->menuId = $request->menuId;
        $order->note = $request->note;
        $order->status = 'Đang chờ duyệt';
        $order->paymentId = 1;
        $order->userId = 1;

        $paymentMethods = PaymentMethod::all();
        // $menu = Menu::Where('id', $request->menuId)->get();

        // $menu = Menu::where('id', 1)->get();
        $totalCost = 0;
        $menu = DB::table('menus')->where('id', $request->menuId)->where('serviceId', 1)
            ->first();

        $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
        foreach ($menu->menuFoods as $mf) {
            $mf->food = Food::findOrFail($mf->foodId);
            $totalCost += $mf->food->price;
        }

        $totalCost *= $request->peopleNumber;

        // $menuFoods = MenuFood::Where('menuId', $menu->id)->get();
        // foreach ($menuFoods as $menuFood) {
        //     $foods = Food::Where('id', $menuFood->foodId)->get();
        // }



        return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
            ->with('totalCost', $totalCost);
    }
}
