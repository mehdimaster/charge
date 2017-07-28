<?php

namespace App\Http\Controllers\MTN;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HelpMethod;
use App\Order;

class MTNController extends \App\Http\Controllers\Controller
{
    public function chargeTopUp()
    {
        if(isset($_POST['is_wow'])){
            $validator = Validator::make(Input::all(), [
                "amount_wow" => "required",
                "mobile" => "required",
            ]);
            $amount = Input::get('amount_wow');
        }else{
            $validator = Validator::make(Input::all(), [
                "amount" => "required",
                "mobile" => "required",
            ]);
            $amount = Input::get('amount');
        }


        if ($validator->fails()) {
            return Redirect::to(url("/"))->with('error', 'required');
        }
        //validator
        $uid = HelpMethod::random(4).time();
        Order::saveOrder('MTN',$uid);
        return view('formBank',compact('uid','amount'));
    }
}
