<?php

namespace App\Http\Controllers\MCI;

use App\Order;
use \App\Postman;
use \App\HelpMethod;


class MCIController extends \App\Http\Controllers\Controller
{

    public function chargeTopUp()
    {
        //validator
        Order::saveOrder('MCI');
        return view('frontend.simulate_bank', ['uid' => $order->uid]);
        //redirect to view bank form
    }




}
