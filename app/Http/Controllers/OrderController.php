<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\MenuFood;
use App\Models\Food;
use Illuminate\Database\Eloquent\Collection;
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
        

        if($request->menuId == -1) {
            $foodIds = $request->session()->get('foodIds', null);
            $totalCost = 0;
            $foods = new Collection();
            foreach($foodIds as $foodId) {
                $food = Food::where('id', $foodId)->first();   
                $foods->push($food);
                $totalCost += $food->price;
            }
            $totalCost *= $request->peopleNumber;

            return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('foods', $foods)
                                    ->with('totalCost', $totalCost);
        } else {
            $menu = DB::table('menus')->where('id', $request->menuId)->where('serviceId', 1)
                                                                        ->first();

            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            $totalCost = 0;
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::findOrFail($mf->foodId);
                $totalCost += $mf->food->price;
            }

            $totalCost *= $request->peopleNumber;

            
            return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
                                    ->with('totalCost', $totalCost);
        }



        // return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
        //     ->with('totalCost', $totalCost);
    }

    public function backToHomePage() {
        redirect('home');
    }
}
