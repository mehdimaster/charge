<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMTN extends Model
{
    public static function finish($order)
    {
//        $orderFind = Order::where('uid',$order->uid)->first();
        $url = 'https://topup.irpointcenter.com/irancell/buytopupcharge2';
        $params = [
            "id"=>null,
            "profileType"=>$order->is_wow,
            "amount"=>$order->amount,
            "mSISDN"=>"$order->mobile",
            "user"=>"77310",
            "password"=>"4235916726e1d8b218bcffc26662d701c26aa3c600",
            "resellerName"=>"",
            "fDate"=>"",
            "tDate"=>null,
            "dcCode"=>"",
            "merchantName"=>"",
            "pageNumber"=>"1",
            "pageSize"=>"20",
            "chargeChannel"=>1,
            "invoiceNumber"=>"$order->uid",
            "trnBizKey"=>"101",
            "msisdntype"=>1
        ];
        $response = json_decode(Postman::init()->execute($url,$params)->response());
        if($response->trnState == '200'){
            $data['status']='عملیات با موفقیت انجام شد.';
            $data['trnBizKey'] = $response->trnBizKey;// code peygiri eniac
            $data['providerTID'] = $response->irancellTID;// code peygiri eniac
            Payment::updateTRN($order->uid , '1' , $response->trnState , $response->trnBizKey , $response->irancellTID);

        }elseif($response->trnState == '110'){
            $data['status']='موجودی شما کافی نیست';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '120'){
            $data['status']='نام کاربری یا رمز عبور اشتباه است';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '130'){
            $data['status']='حساب مسدود شده است';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '140'){
            $data['status']='کد پذیرنده اشتباه می باشد';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '150'){
            $data['status']='خطای داخلی رخ داده است';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '160'){
            $data['status']='مشکل داخلی همراه اول';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '170'){
            $data['status']='شماره تلفن وارد شده اشتباه می باشد';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '180'){
            $data['status']='خطای پرداخت پذیرنده';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }elseif($response->trnState == '190'){
            $data['status']='شماره تلفن اشتباه می باشد یا مبلغ اشتباه می باشد';
            Payment::updateTRN($order->uid , '-1' , $response->trnState);
        }
        return $order->uid;

    }
}
