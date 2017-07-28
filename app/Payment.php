<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public static function resolveProvider($provider)
    {
        switch ($provider) {
            case self::SAMAN:
                return \App\SamanPayment::class;
                break;
        }
    }
}
