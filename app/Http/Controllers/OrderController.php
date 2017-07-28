<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MCI\MCIController;
use App\Order;
use \App\Postman;
use \App\HelpMethod;

class OrderController extends Controller
{
    public function bankCallback(Request $request, $provider)
    {
        /*
         ba tavajo be bank call back khodesh run she
        agar ok bud function finish driver run she
        agar ok nabud payment failed she
         */
        $paymentDriver = Payment::resolveProvider($provider); // Find payment provider (Wich bank?)

        $order = Order::where('uid' , $request->{$paymentDriver::ORDER_IDENTIFIER})->first(); // Find order by identifier here - order is object

        $orderDriver = Order::resolveDriver($order); // Find order type (Train, Hotel, Flight or ...)

        if($request->{$paymentDriver::RESULT_IDENTIFIER} == $paymentDriver::SUCCESS) { // We assume each provider has deffrent success code

            //TODO: Create payment here

            $ticketNumber = $orderDriver::finish($order);

            return redirect(\App::getLocale()."/train/invoice/$ticketNumber");

        } else {

            Order::changeStatus($order->id, Order::FAILED);

            return "Payment Failed!";
        }



        $order = '';// az callback bank miad
        $mciObject = new MCIController();
        $mciObject->finish($order);
    }

}