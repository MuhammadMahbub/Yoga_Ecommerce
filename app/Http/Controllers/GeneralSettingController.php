<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

     /**
     * Construct
     */
    public function __construct()
    {
        $this->middleware('permission:stripe,read')->only('stripeIndex');
        $this->middleware('permission:general_setting,read')->only('index');
        $this->middleware('permission:general_setting,create')->only('create');
        $this->middleware('permission:general_setting,edit')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.generalSettings.index', [

            'generalSettings' => GeneralSetting::first()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        // Form Validation
        $request->validate([
            'logo'        => 'image',
            'logo_dark'         => 'image',
            // 'favicon'           => 'image',

            'phone'             => 'required',
            'address'           => 'required',
            'email'             => 'required|email',
            'copyright'         => 'required',
        ]);

         //  Logo
         if($request->hasFile('logo')){

            $logo = $request->file('logo');
            $filename = 'logo.'. $logo->extension('logo');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo = $filename;

        }
         //  Logo
         if($request->hasFile('logo_dark')){

            $logo = $request->file('logo_dark');
            $filename = 'logo_dark.'. $logo->extension('logo_dark');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo_dark = $filename;

        }

        //  Favicon
        if($request->hasFile('favicon')){

            $favicon = $request->file('favicon');
            $favicon_filename = 'favicon.'. $favicon->extension('favicon');
            $favicon_location = public_path('uploads/generalSettings/');
            $favicon->move($favicon_location, $favicon_filename);

            $generalSetting->favicon = $favicon_filename;
        }


        $generalSetting->email             = $request->email;
        $generalSetting->phone             = $request->phone;
        $generalSetting->address           = $request->address;
        $generalSetting->copyright         = $request->copyright;


        $generalSetting->save();

        return back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }

    public function stripeIndex(){
        $stripe = StripeSetting::first();
        if(!$stripe){
            $stripe = StripeSetting::Create();
        }
        return view('admin.stripeSettings.index', compact('stripe'));
    }

    public function stripeStore(Request $request){
        $request->validate([
            'stripe_key' => 'required',
            'stripe_secret' => 'required',
        ]);
        StripeSetting::first()->update($request->except('_token'));
        return back()->with('success', __("Updated Successfully") );
    }
}
