<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const SAMAN = 'smn';
    public static function resolveProvider($provider)
    {
        switch ($provider) {
            case self::SAMAN:
                return \App\SamanPayment::class;
                break;
        }
    }

    public static function updateTRN($uid , $status , $trnState , $trnBizKey = null , $providerTID = null )
    {
        Payment::where('uid',$uid)->update(
            ['trnState'=>$trnState,
            'trnBizKey'=>$trnBizKey,
            'providerTID'=>$providerTID,
            'status'=>$status]);
    }
}
