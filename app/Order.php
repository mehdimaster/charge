<?php

namespace App;

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
}
