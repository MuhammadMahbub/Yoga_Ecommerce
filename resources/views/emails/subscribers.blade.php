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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Subscriber</title>
</head>

<body style="margin:0;padding:0; ">
    <table role="presentation" style="width:100% !important;border-collapse:collapse;border:0;border-spacing:0;background:#f0f0f0; height: 100vh; font-family:Arial,sans-serif;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:602px;border-collapse:collapse; border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:5px 0 5px 0;">
                            <img src="https://yoga.contact-support.co/uploads/generalSettings/logo.png" alt="main logo" style="height:100px; display:block;" />
                        </td>
                    </tr>
                    <tr style="background-color: #ffffff;">
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643; text-align: center;">
                                        <h1 style="font-size:24px; text-align: center;">
                                            Thank you for subscription
                                        </h1>
                                        <br>
                                        <img src="https://i.postimg.cc/43bybtgk/email-envelope-small.png" alt="password" width="80">
                                        <p style="margin:20px auto;font-size:16px;line-height:24px;text-align: center; width: 350px;">
                                            You will be notified all updates by email
                                        </p>
                                        {{-- <p style="margin:0;font-size:16px;line-height:24px;text-align: center;">
                                            <a href="#" style="color:#ffffff; text-decoration: none; text-align: center; padding: 10px 20px; background: #75dab4; border-radius: 5px;">
                                                Verify Email Address
                                            </a>
                                        </p> --}}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td style="padding:0;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;text-align: center;">
                                                        You're almost ready to start enjoying soClose Simple Click the
                                                        big Button to verify your email address
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> --}}
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;">
                                <tr>
                                    <td style="padding:0;" align="center">
                                        <p style="margin:0;font-size:14px;line-height:16px;color: #949492;">
                                           {{ generalsettings()->copyright }}
                                        </p>
                                        <br>
                                        <p style="margin:0;font-size:14px;line-height:16px; color: #949492;">
                                            {{  generalsettings()->address }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:20px 0;" align="center">
                                        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                @if (socialurls()->fb_url != null)
                                                    <td style="padding:0 0 0 10px; width:34px;">
                                                        <a href="{{ socialurls()->fb_url }}" target="_blank" style="color:#ffffff;">
                                                            <img src="https://i.postimg.cc/3JFKH6B9/facebook.png" alt="facebook" width="38" style="height:auto;display:block;border:0;" />
                                                        </a>
                                                    </td>
                                                @endif

                                                @if (socialurls()->linkedin_url != null)
                                                    <td style="padding:0 0 0 10px;width:34px;">
                                                        <a href="{{ socialurls()->linkedin_url }}" target="_blank" style="color:#ffffff;">
                                                            <img src="https://i.postimg.cc/qvBpBLDr/linkedin.png"  alt="linkedin" width="38" style="height:auto;display:block;border:0;" />
                                                        </a>
                                                    </td>
                                                @endif

                                                @if (socialurls()->twitter_status != null)
                                                    <td style="padding:0 0 0 10px;width:34px;">
                                                        <a href="{{ socialurls()->twitter_status }}" target="_blank" style="color:#ffffff;">
                                                            <img src="https://i.postimg.cc/MGvxVG8r/twitter.png" alt="twitter" width="38" style="height:auto;display:block;border:0;" />
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                        <p style="margin:0;font-size:14px;line-height:16px;text-align: center; color: #949492;">
                                            You recevied this email because you subscribe for {{ config('app.name') }}
                                        </p>
                                        <br>
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
