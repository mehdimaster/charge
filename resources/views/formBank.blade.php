<div class="list-wrap" style="display: none;">

    <form id="BankForm" action='{{url("payment/gotosaman")}}' method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" >
        <input type="hidden" name="amount" value='<?php echo $amount;?>'/>
        <input type="hidden" name="pin" value='kVuMVVQP2uR2GwN52W18'/>
        <input type='hidden' name='paymentId'  value='' />
        <input type="hidden" name="orderId"     value='<?php echo $uid;?>'/>
        <input type='hidden' name='revertURL' value='"{{url("smn/callback?order_id=$uid")}}"' />
        <input type="submit" value="پرداخت" style="display:none">
    </form>
</div>


<script>
    //document.getElementById('BankForm').submit();
</script>