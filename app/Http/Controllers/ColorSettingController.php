<?php

namespace App\Http\Controllers;

use App\Models\ColorSetting;
use Illuminate\Http\Request;

class ColorSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:social_url,read')->only('index');
        $this->middleware('permission:social_url,create')->only('create');
        $this->middleware('permission:social_url,edit')->only('edit');
    }

    public function index()
    {
        return view('admin.colorSettings.index', [

            'colorSettings' => colorSetting::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ColorSetting  $colorSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorSetting $colorSetting)
    {
        // Form Validation
        $request->validate([
            'button_color'        => 'required',
            'button_hover_color'  => 'required',
            'menu_text_color'     => 'required',
            'body_text_color'     => 'required',
            'body_title_color'    => 'required',
            'bg_color'            => 'required',
            'secondary_bg_color'  => 'required',
        ]);

        $colorSetting->button_color       = $request->button_color;
        $colorSetting->button_hover_color = $request->button_hover_color;
        $colorSetting->menu_text_color    = $request->menu_text_color;
        $colorSetting->body_text_color    = $request->body_text_color;
        $colorSetting->body_title_color   = $request->body_title_color;
        $colorSetting->bg_color           = $request->bg_color;
        $colorSetting->secondary_bg_color = $request->secondary_bg_color;


        $colorSetting->save();

        return back()->withSuccess( __("Updated Successfully") );
    }

}
