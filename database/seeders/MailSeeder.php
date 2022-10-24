<?php

namespace Database\Seeders;

use App\Models\MailSetting;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mail = new MailSetting();
        $mail->mailer       = 'smtp';
        $mail->host         = 'smtp.gmail.com';
        $mail->port         = '465';
        $mail->username     = 'raktimsoclose@gmail.com';
        $mail->password     = 'kkbzwanfchryxwjf';
        $mail->encryption   = 'ssl';
        $mail->from_email   = 'raktimsoclose@gmail.com';
        $mail->from_name    = 'YoGa';
        $mail->save();
    }
}
