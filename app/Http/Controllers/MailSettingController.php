<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailSetting;
use Illuminate\Http\Request;

class MailSettingController extends Controller
{
    public function index()
    {
        $mail = MailSetting::first();
        return view('admin.email_setting.index',compact('mail'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([

            'mailer'     => 'required',
            'host'       => 'required',
            'port'       => 'required',
            'username'   => 'required',
            'password'   => 'required',
            'encryption' => 'required',
            'from_email' => 'required',
            'from_name'  => 'required',
        ]);


        $mail = MailSetting::find($id);
        $mail->mailer       =  $request->mailer;
        $mail->host         =  $request->host;
        $mail->port         =  $request->port;
        $mail->username     =  $request->username;
        $mail->password     =  $request->password;
        $mail->encryption   =  $request->encryption;
        $mail->from_email   =  $request->from_email;
        $mail->from_name    =  $request->from_name;
        $mail->save();


        return back()->with('success',__('Updated successfully'));
    }
}
