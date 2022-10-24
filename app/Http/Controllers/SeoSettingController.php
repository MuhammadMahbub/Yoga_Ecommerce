<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoSettingController extends Controller
{
    public function index(){
        return view('admin.seo.index',[
            'home'    => SeoSetting::where('page_name', 'home')->first(),
            'about'   => SeoSetting::where('page_name', 'about')->first(),
            'contact' => SeoSetting::where('page_name', 'contact')->first(),
        ]);
    }

    public function home_seo_setting(Request $request ,$id)
    {
        session()->put(['section_name' => $request->name]);

        SeoSetting::find($id)->update($request->except('_token','page_name') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess( __("Home Page Seo Updated Successfully") );
    }

    public function about_seo_setting(Request $request ,$id)
    {
        session()->put(['section_name' => $request->name]);

        SeoSetting::find($id)->update($request->except('_token','page_name') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess( __("About Page Seo Updated Successfully") );
    }

    public function contact_seo_setting(Request $request ,$id)
    {
        session()->put(['section_name' => $request->name]);

        SeoSetting::find($id)->update($request->except('_token','page_name') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess( __("Contact Page Seo Updated Successfully") );
    }
}
