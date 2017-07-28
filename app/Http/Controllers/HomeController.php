<?php

namespace App\Http\Controllers;

use App\Payment;

class HomeController extends Controller
{
    public function index()
    {
        return view('chargeForms');
    }

    public function afterPay($orderId)
    {
        $payment = Payment::where('uid',$orderId)->first();
        return view('afterPay',compact('payment'));
    }
}