<?php

namespace App;
use \App\HelpMethod;

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


    public static function saveOrder($driver)
    {
        $uid = HelpMethod::random(4).time();
        $order = new Order();
        $order->amount = Input::get('amount');
        $order->is_wow = isset($_POST['is_wow']) ? Input::get('is_wow') : '0';
        $order->mobile = Input::get('mobile');
        $order->driver = Order::$driver;
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
