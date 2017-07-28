<?php

namespace App\Http\Controllers\MCI;

use App\Order;
use Postman;
use HelpMethod;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class MCIController extends \App\Http\Controllers\Controller
{

    public function chargeTopUp()
    {
        $validator = Validator::make(Input::all(), [
            "amount" => "required",
            "mobile" => "required",
        ]);

        if ($validator->fails()) {
                return Redirect::to(url("/"))->with('error', 'required');
        }
        //validator
        $uid = HelpMethod::random(4).time();
        $amount = Input::get('amount');
        Order::saveOrder('MCI',$uid);
        return view('formBank',compact('uid','amount'));
        //redirect to view bank form
    }




}
