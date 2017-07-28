<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMCI extends Model
{
    public static function finish($order)
    {
        $orderFind = Order::where('uid',$order->uid)->first();
        $url = 'https://mci.irpointcenter.com/mci/buytopupcharge';
        $params = [
            "amount"=>$orderFind->amount,
            "mSISDN"=>$orderFind->mobile,
            "user"=>"17235",
            "password"=>"84cbb8cba7a5a5gvjghf98ab30b5b0cuu948ccakil74f93",
            "chargeChannel"=>1,
            "fDate"=>null,
            "tDate"=>null,
            "dcCode"=>null,
            "merchantName"=>null,
            "pageNumber"=>null,
            "pageSize"=>null,
            "invoiceNumber"=>$orderFind->uid,
            "chargeType"=>"DIRECT"
        ];
        $response = json_decode(Postman::init()->execute($url,$params)->response());
        if($response->trnState == '200'){
            $data['status']='عملیات با موفقیت انجام شد.';
            $data['trnBizKey'] = $response->trnBizKey;// code peygiri eniac

        }elseif($response->trnState == '110'){
            $data['status']='موجودی شما کافی نیست';
        }elseif($response->trnState == '120'){
            $data['status']='نام کاربری یا رمز عبور اشتباه است';
        }elseif($response->trnState == '130'){
            $data['status']='حساب مسدود شده است';
        }elseif($response->trnState == '140'){
            $data['status']='کد پذیرنده اشتباه می باشد';
        }elseif($response->trnState == '150'){
            $data['status']='خطای داخلی رخ داده است';
        }elseif($response->trnState == '160'){
            $data['status']='مشکل داخلی همراه اول';
        }elseif($response->trnState == '170'){
            $data['status']='شماره تلفن وارد شده اشتباه می باشد';
        }elseif($response->trnState == '180'){
            $data['status']='خطای پرداخت پذیرنده';
        }elseif($response->trnState == '190'){
            $data['status']='شماره تلفن اشتباه می باشد یا مبلغ اشتباه می باشد';
        }

        //return view state
    }
}
