<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SamanPayment extends Model
{
    const ORDER_IDENTIFIER = 'order_id';
    const RESULT_IDENTIFIER = 'status';
    const SUCCESS = 1;
    const FAILED = 0;
}
