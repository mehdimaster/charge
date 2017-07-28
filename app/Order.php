<?php

namespace App;
use App\Http\Controllers\HelpMethod;
use Illuminate\Support\Facades\Input;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    const MCI = 'MCI';
    const MTN = 'MTN';
    const RIGH_TEL = 'RighTel';

    //Order statuses
    const CREATED = 0;
    const FAILED  = -1;
    const SUCCESS = 1;


    public static function saveOrder($driver , $uid)
    {
        if(isset($_POST['is_wow'])){
            $amount = Input::get('amount_wow');
        }else{
            $amount = Input::get('amount');
        }
        $order = new Order();
        $order->amount = $amount;
        if($driver == 'RighTel'){
            $order->is_wow = isset($_POST['is_wow']) ? '3' : '2';
            $order->driver = Order::RIGH_TEL;
        }elseif($driver == 'MTN'){
            $order->is_wow = isset($_POST['is_wow']) ? '19' : '20';
            $order->driver = Order::MTN;
        }else{
            $order->is_wow = '0';
            $order->driver = Order::MCI;
        }
        $order->mobile = Input::get('mobile');
        $order->email = isset($_POST['email']) ? Input::get('email') : '';
        $order->status = Order::CREATED;
        $order->uid = $uid;
        $order->save();
    }

    public static function resolveDriver($order)
    {
        switch ($order->driver) {
            case self::MCI:
                return \App\OrderMCI::class;
                break;
            case self::MTN:
                return \App\OrderMTN::class;
                break;
            case self::RIGH_TEL:
                return \App\OrderRighTel::class;
                break;
        }
    }

    public static function changeStatus($orderId, $status)
    {
        Order::find($orderId)->update(['status' => $status]);
    }
}
