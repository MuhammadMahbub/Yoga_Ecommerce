<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsUpdateRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:about,read')->only('index');
        $this->middleware('permission:about,edit')->only('edit');
    }

    public function index()
    {
        return view('admin.abouts.index', [
            'about' => AboutUs::first(),
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUsUpdateRequest $request, $id)
    {
        $about = AboutUs::find($id);
        $about->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        if($request->hasFile('banner_image')){
            $image     = $request->file('banner_image');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/abouts');
            $image->move($location, $fileName);
            $about->banner_image = $fileName;
        }

        if($request->hasFile('image')){
            $image     = $request->file('image');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/abouts');
            $image->move($location, $fileName);
            $about->image = $fileName;
        }

        $about->save();

        return redirect()->route('about.index')->with('success', __("Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
