<?php

namespace App\Http\Controllers;

use App\Models\Socialurl;
use Illuminate\Http\Request;

class SocialurlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:color_setting,read')->only('index');
        $this->middleware('permission:color_setting,create')->only('create');
        $this->middleware('permission:color_setting,edit')->only('edit');
    }


    public function index()
    {
        return view('admin.socialurls.index',[

            'socialurls' => Socialurl::first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socialurl  $socialurl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socialurl $socialurl)
    {
         // Form Validation
         $request->validate([
            'fb_url'        => 'required',
            'instagram_url' => 'required',
            'youtube_url'   => 'required',
            'twitter_url'   => 'required',
            'linkedin_url'  => 'required',
        ]);


        $socialurl->fb_url            = $request->fb_url;
        $socialurl->instagram_url     = $request->instagram_url;
        $socialurl->youtube_url       = $request->youtube_url;
        $socialurl->twitter_url       = $request->twitter_url;
        $socialurl->linkedin_url      = $request->linkedin_url;

        $socialurl->save();

        return back()->withSuccess('{{ __("Updated Successfully") }}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socialurl  $socialurl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socialurl $socialurl)
    {
        //
    }

    public function statusChange(Request $request){
        Socialurl::first()->update([
            $request->column => $request->status,
        ]);
        return response(__('Status Updated'));
    }
}
