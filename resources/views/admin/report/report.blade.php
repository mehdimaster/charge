@extends('admin.masterAdmin')
@section('content')

    <table class="table table-striped" style="text-align: left">
        <thead>
        <tr>
            <th>کد پیگیری سایت شارژ</th>
            <th style="text-align: left">موبایل</th>
            <th style="text-align: left">ایمیل</th>
            <th style="text-align: left">مقدار شارژ</th>
            <th style="text-align: left">وضعیت</th>
            <th style="text-align: left">کد TRN</th>
            <th style="text-align: left">کد پیگیری انیاک</th>
            <th style="text-align: left">کد پیگیری اپراتور</th>
            <th style="text-align: left">زمان تراکنش</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['reportPayment'] as $reportPayment)
            <tr>
                <th scope="row">{{$reportPayment->uid}}</th>
                <td>{{$reportPayment->mobile}}</td>
                <td>{{$reportPayment->email}}</td>
                <td>{{$reportPayment->amount}}</td>
                @if($reportPayment->status == 1)
                    <td class="btn-success">موفق</td>
                @elseif($reportPayment->status == 0)
                    <td class="btn-danger">نا موفق</td>
                @elseif($reportPayment->status == -1)
                    <td class="btn-warning">نا موفق - بازگشت پول</td>
                @endif
                <td>{{$reportPayment->trnState}}</td>
                <td>{{$reportPayment->trnBizKey}}</td>
                <td>{{$reportPayment->providerTID}}</td>
                @php
                    $date = explode('-',explode(' ',$reportPayment->created_at)[0]);
                    $convertDateToJalaliArr = DateJalali::gregorian_to_jalali($date[0],$date[1],$date[2]);
                    $convertDateToJalali = $convertDateToJalaliArr[0].'/'.$convertDateToJalaliArr[1].'/'.$convertDateToJalaliArr[2];
                @endphp
                @php $time = explode(' ',$reportPayment->created_at)[1]; @endphp
                <td>{{$convertDateToJalali .' ساعت '.$time}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop