{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body {
            height: 100% !important;
            width: 100% !important;
        }
    </style>



<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee; font-family:Arial,sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-family:Arial,sans-serif;">
        <tr>
            <td align="center" style="background-color: #eeeeee;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="padding: 35px; background-color: {{ colorSettings()->button_color }};">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="text-align: center;">
                                        <img src="https://yoga.contact-support.co/uploads/generalSettings/logo.png" alt="Logo" width="200"> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style=" font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <img src="https://i.postimg.cc/rw3M7y1s/Approved.png" width="125" height="120" style="display: block; border: 0px;" />
                                        <br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #000000; margin: 0;">
                                            Refund!
                                        </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style=" font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #000000;">
                                            You have succesfully refunded from {{ config('app.name') }} . Class date: <strong style="font-weight: 600; margin: 0;">{{ \Carbon\Carbon::parse($order->class_date)->format('d M Y') }}</strong>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">

                                            <tr style="background-color: {{ colorSettings()->button_color }}; color:#ffffff">
                                                <td width="20%" align="left" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    ID
                                                </td>
                                                <td width="55%" align="left" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    Product/Service
                                                </td>
                                                <td width="20%" align="left" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    Price
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="20%" align="left" style="font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                    #{{ $order->order_number }}
                                                </td>
                                                <td width="55%" align="left" style="font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                    {{ $order->getClass->title }} 
                                                </td>
                                                <td width="25%" align="left" style="font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                    €{{ $order->order_total + $order->coupon_discount }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="right" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee;">
                                                    Coupon 
                                                </td>
                                                <td width="25%" align="left" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee;">
                                                    €{{ $order->coupon_discount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="right" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    Refund amount 
                                                </td>
                                                <td width="25%" align="left" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    €{{ $order->refund_amount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="right" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    TOTAL 
                                                </td>
                                                <td width="25%" align="left" style="font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    €{{ $order->order_total -  $order->refund_amount }} 
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" height="100%" valign="top" width="100%"
                            style="padding: 0 35px 35px 35px; background-color: #ffffff;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="left" valign="top" style="font-size:0;" style="display:inline-block; width:100%;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top" style="font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800; margin: 0;">Personal information</p>
                                                    <p>
                                                        Name: {{ $order->shipping_name }}<br>
                                                        Email: {{ $order->shipping_email }}<br>
                                                        Phone: {{ $order->shipping_mobile }}<br>
                                                        Address: {{ $order->shipping_address }}<br>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>