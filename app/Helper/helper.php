<?php

// General Settings

use App\Models\MailSetting;
use App\Models\RolePermission;
use App\Models\TrainerForClass;
use App\Models\UserPermission;
use App\Models\YogaClass;
use App\Models\YogaStudio;
use Illuminate\Support\Facades\Auth;

function generalsettings()
{
    return \App\Models\GeneralSetting::first();
}

// Social Urls
function socialurls()
{
    return \App\Models\Socialurl::first();
}

// Color Settings
function colorSettings()
{
    return \App\Models\ColorSetting::first();
}

// ThemeSettings
function themesettings($user_id)
{
    return \App\Models\ThemeSetting::where('user_id', $user_id)->first();
}

// category
function categories()
{
    return \App\Models\Category::all();
}


function userHavePermission($user_id,$model,$action)
{

    $user_permisson = UserPermission::where('user_id',$user_id)->where('model',$model)->where('action',$action)->first();

    if ($user_permisson == null) {

        return false;

    }else {

        return true;
    }

}


function roleHavePermission($role_id,$model,$action)
{

    $role_permisson = RolePermission::where('role_id',$role_id)->where('model',$model)->where('action',$action)->first();

    if ($role_permisson == null) {

        return false;

    }else {

        return true;

    }

}


function havePermission($model,$action)
{
    $user_permisson = UserPermission::where('user_id',Auth::user()->id)->where('model',$model)->where('action',$action)->first();

    if ($user_permisson == null) {

        return false;

    }else {

        return true;
    }
}

function cartItem(){
    return \App\Models\Cart::where('device_ip', request()->ip())->get();
}

function cartTotal(){
    $cartItem = \App\Models\Cart::where('device_ip', request()->ip())->get();
    $total = 0;
    foreach($cartItem as $item){
        $total += $item->product->price * $item->quantity;
    }
    return $total;
}

function studio(){
    return \App\Models\YogaStudio::get()->take(5);

    
}


function checkTrainerForTeam($class_id,$trainer_id){

    return TrainerForClass::where('class_id',$class_id)->where('trainer_id',$trainer_id)->first();

}


function getEmailSetting(){

    return MailSetting::first();

}


