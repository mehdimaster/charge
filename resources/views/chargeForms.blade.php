
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<!-- START of IranCell form -->
<h3>Irancell </h3>
      <form id="iranCell" action="{{url('mtn/charge')}}" method="post" class="form-horizontal">

        <input type="hidden" value="{{csrf_token()}}" name="_token" id="tish">

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_mobile">Mobile</label>
          <div class="col-sm-8">
            <input type="text" name="mobile" id="id_mobile" value="" class="form-control1">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_SA">ShegeftAngiz</label>
          <div class="col-sm-8">
            <input type="checkbox" name="is_wow" id="id_SA" value="" class="form-control1">
          </div> 
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_SA_amount">Amount</label>
          <div class="col-sm-8">
            <input type="text" name="amount" id="id_SA_amount" value="" class="form-control1"> IRR
            <select name="amount_wow" id="id_SA_amount_dropdown" style="display:none" class="form-control1">
                <option value="10000" class="lable" selected="">10,000</option>
                <option value="20000">20,000</option>
                <option value="50000">50,000</option>
                <option value="100000">100,000</option>
                <option value="200000">200,000</option>
            </select> 
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_email">Email</label>
          <div class="col-sm-8">
            <input type="text" name="email" id="id_email" value="" class="form-control1">
          </div>
        </div>       

        <div class="col-sm-2"></div>
        <input type="submit" value="Submit" class="btn-success btn ">

      </form>
<!-- END of IranCell form -->
<hr>
<!-- START of MCI form -->
<h3>MCI </h3>
      <form id="MCI" action="{{url('mci/charge')}}" method="post" class="form-horizontal">

        <input type="hidden" value="{{csrf_token()}}" name="_token" id="tish">

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_mobile">Mobile</label>
          <div class="col-sm-8">
            <input type="text" name="mobile" id="id_mobile" value="" class="form-control1">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_amount">Amount</label>
          <div class="col-sm-8">
            <input type="text" name="amount" id="id_amount" value="" class="form-control1"> IRR
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_email">Email</label>
          <div class="col-sm-8">
            <input type="text" name="email" id="id_email" value="" class="form-control1">
          </div>
        </div>       

        <div class="col-sm-2"></div>
        <input type="submit" value="Submit" class="btn-success btn ">

      </form>

<!-- END of MCI form -->
<hr>
<!-- START of Rightel form -->
<h3> Rightel </h3>
      <form id="Rightel" action="{{url('rightel/charge')}}" method="post" class="form-horizontal">

        <input type="hidden" value="{{csrf_token()}}" name="_token" id="tish">

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_mobile">Mobile</label>
          <div class="col-sm-8">
            <input type="text" name="mobile" id="id_mobile" value="" class="form-control1">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_SHA">ShoorAngiz</label>
          <div class="col-sm-8">
            <input type="checkbox" name="is_wow" id="id_SHA" value="" class="form-control1">
          </div> 
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_SHA_amount">Amount</label>
          <div class="col-sm-8">
            <input type="text" name="amount" id="id_SHA_amount" value="" class="form-control1"> IRR
            <select name="amount_wow" id="id_SHA_amount_dropdown" style="display:none" class="form-control1">
                <option value="10000" class="lable" selected="">10,000</option>
                <option value="20000">20,000</option>
                <option value="50000">50,000</option>
                <option value="100000">100,000</option>
                <option value="200000">200,000</option>
            </select> 
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="id_email">Email</label>
          <div class="col-sm-8">
            <input type="text" name="email" id="id_email" value="" class="form-control1">
          </div>
        </div>       

        <div class="col-sm-2"></div>
        <input type="submit" value="Submit" class="btn-success btn ">

      </form>
<!-- END of Rightel form -->




<script type="text/javascript">
$(document).ready(function () {
    var SA_ckbox = $('#id_SA');
    var SHA_ckbox = $('#id_SHA');

    $('input').on('click',function () {
        if (SA_ckbox.is(':checked')) {
           
           $('#id_SA_amount').hide();
           $('#id_SA_amount_dropdown').show();

        } else {
          
           $('#id_SA_amount').show();
           $('#id_SA_amount_dropdown').hide();
        }
    });

    $('input').on('click',function () {
        if (SHA_ckbox.is(':checked')) {
           
           $('#id_SHA_amount').hide();
           $('#id_SHA_amount_dropdown').show();

        } else {
          
           $('#id_SHA_amount').show();
           $('#id_SHA_amount_dropdown').hide();
        }
    });
});
</script>