<?php

namespace App\Providers;

use App\Models\MailSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            // Use bootstrap 4 paginator 
        Paginator::defaultView('pagination::bootstrap-4');
             // Schema::defaultStringLength(125);
        Schema::defaultStringLength(191);

        $mail_setting = MailSetting::first();

        if ($mail_setting) {
            $data = [
                'driver'     => $mail_setting->mailer,
                'host'       => $mail_setting->host,
                'port'       => $mail_setting->port,
                'encryption' => $mail_setting->encryption,
                'username'   => $mail_setting->username,
                'password'   => $mail_setting->password,
                'from'       => [
                    'address' => $mail_setting->from_email,
                    'name'    => $mail_setting->from_name,
                ],
            ];

            Config::set('mail',$data);
        }
    
    }
}
