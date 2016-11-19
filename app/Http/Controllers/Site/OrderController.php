<?php

namespace App\Http\Controllers\Site;

use App\Order;
use App\User;
use App\Address;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    function cartOrder()
    {

        if (!Auth::check()) {
            return redirect(action("Site\\AuthController@showlogin"));
        }
        $user = Auth::user();
        return view('site.order', compact('user'));
    }

    function payment(Request $request, Address $addressModel)
    {
        $cart = session('cart');

        $totalprice = 0;
        foreach ($cart as $product) {
            $totalprice += $product['cost'];
        }

        if ($request->get('address') == "new_address") {
            $address_id = Address::create([
                'address' => $request->get('new_address'),
                'user_id' => $request->user()->id
            ])->id;
        } else {
            $address_id = $request->get('address');
        }

        $orderModel = Order::create([
            'shipment_user' => $request->get('shipment_name'),
            'shipment_phone' =>$request->get('shipment_phone'),
            'total_price'=>$totalprice,
            'payment_type'=> $request->get('payment'),
            'delivery_type' =>$request->get('delivery'),
            'user_id'=> $request->user()->id,
            'shipment_address_id'=>$address_id,
            'billing_address_id'=>$address_id
        ]);


        foreach ($cart as $key => $product) {
            $orderModel->products()->attach($key,['product_count'=>$product['count']]);
        }
        session()->put('cart',[]);
        return redirect(action("Site\\IndexController@index"));
    }

}
