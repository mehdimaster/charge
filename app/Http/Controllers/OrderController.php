<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MCI\MCIController;
use App\Order;
use \App\Postman;
use \App\HelpMethod;

class OrderController extends Controller
{
    public function create($driver)
    {
        $uid = HelpMethod::random(4).time();
        $order = new Order();
        $order->amount = Input::get('amount');
        $order->mobile = Input::get('mobile');
        $order->driver = Order::$driver;
        $order->status = Order::CREATED;
        $order->uid = $uid;
        $order->save();

        //redirect to view bank form
    }

    public function bankCallback(Request $request, $provider)
    {
        /*
         ba tavajo be bank call back khodesh run she
        agar ok bud function finish driver run she
        agar ok nabud payment failed she
         */
        $order = '';// az callback bank miad
        $mciObject = new MCIController();
        $mciObject->finish($order);
    }

}