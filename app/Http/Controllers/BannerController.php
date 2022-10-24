<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:banner,read')->only('index');
        $this->middleware('permission:banner,create')->only('create');
        $this->middleware('permission:banner,edit')->only('edit');
    }


    public function index()
    {
        return view('admin.banners.index', [
            'banners' => Banner::latest()->paginate(10),
            'current_locale' => app()->getLocale(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        // if($request->banner_title1['fr'] == ''){
        //     return redirect()->back()->with('error', __('Upper Title in French is Required'));
        // }
        // if($request->banner_title1['en'] == ''){
        //     return redirect()->back()->with('error', __('Upper Title in English is Required'));
        // }

        $banner = Banner::create($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('banner_image')){
            $image     = $request->file('banner_image');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/banners');
            $image->move($location, $fileName);
            $banner->banner_image = $fileName;
        }

        $banner->save();

        return redirect()->route('banner.index')->with('success',  __("Created Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $banner->update([
            'banner_title1' => $request->banner_title1_edit,
            'banner_title2' => $request->banner_title2_edit,
            'button_text'   => $request->button_text_edit,
            'button_url'    => $request->button_url_edit,
            'text_color'    => $request->text_color,
            'updated_at'    => Carbon::now()
        ]);

        if($request->hasFile('banner_image_edit')){
            $image     = $request->file('banner_image_edit');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/banners');
            $image->move($location, $fileName);
            $banner->banner_image = $fileName;
        }

        $banner->save();
        session()->forget('id');

        return redirect()->route('banner.index')->with('success', __("Updated Successfully") );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('error',  __("Deleted Successfully"));
    }

    public function mass_delete(Request $request)
    {
        $banners = Banner::findMany($request->ids);
        $banners->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function bannerDateFilter(){
        $banners = Banner::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.banners.index', compact('banners'));

    }

}
