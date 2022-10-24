<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceClassBannerSetting;
use Illuminate\Http\Request;

class ServiceClassBannerSettingController extends Controller
{
    public function update(Request $request,$id)
    {
        $request->validate([
            'title.fr' => 'required',
            'image'    => 'image|dimensions:width=1366,height=560',
        ],[
            'title.fr.required' => __('Title in french is required'),
        ]);

        $banner = ServiceClassBannerSetting::find($id);
        $banner->title = $request->title;

        if ($request->has('image')) {
            $image = $request->file('image');
            $fileName = 'uploads/service_page_banner/'.'service-banner-'.hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/service_page_banner/',$fileName);
            $banner->image = $fileName;
        }
        $banner->save();


        return back()->with('success',__('Updated successfully'));
    }
}
