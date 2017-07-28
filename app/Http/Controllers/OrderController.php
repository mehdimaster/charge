<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MCI\MCIController;
use App\Order;
use App\Payment;
use \App\Postman;
use \App\HelpMethod;

class OrderController extends Controller
{
    public function bankCallback(Request $request, $provider)
    {
        $paymentDriver = Payment::resolveProvider($provider); // Find payment provider (Wich bank?)
        $order = Order::where('uid' , $request->{$paymentDriver::ORDER_IDENTIFIER})->first(); // Find order by identifier here - order is object
        $orderDriver = Order::resolveDriver($order); // Find order type ( object az orderMCI , orderMTn ,...)
        if($request->{$paymentDriver::RESULT_IDENTIFIER} == $paymentDriver::SUCCESS) { // We assume each provider has deffrent success code
            //TODO: Create payment here
            $payment = new Payment();
            $payment->mobile = $order->mobile;
            $payment->email = $order->email;
            $payment->amount = $order->amount;
            $payment->status = '1';// 1 = success |||||  0 = failed |||| -1 = rollback
            $payment->uid = $order->uid;
            $payment->save();

            $orderId = $orderDriver::finish($order);
            return redirect("/afterpay/$orderId");
        } else {
            //TODO: Create payment here
            $payment = new Payment();
            $payment->mobile = $order->mobile;
            $payment->email = $order->email;
            $payment->amount = $order->amount;
            $payment->status = '0';// 1 = success |||||  0 = failed
            $payment->uid = $order->uid;
            $payment->save();
            Order::changeStatus($order->id, Order::FAILED);
            return "Payment Failed!";
        }

    }

}