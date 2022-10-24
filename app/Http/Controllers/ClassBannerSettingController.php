<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassBannerSetting;
use Illuminate\Http\Request;

class ClassBannerSettingController extends Controller
{
    public function update(Request $request,$id)
    {
        $request->validate([
            'title.fr' => 'required',
            'image'    => 'image|dimensions:width=1366,height=560',
        ],[
            'title.fr.required' => __('Title in french is required'),
        ]);

        $banner = ClassBannerSetting::find($id);
        $banner->title = $request->title;

        if ($request->has('image')) {
            $image = $request->file('image');
            $fileName = 'uploads/class_page_banner/'.'class-banner-'.hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/class_page_banner/',$fileName);
            $banner->image = $fileName;
        }
        $banner->save();


        return back()->with('success',__('Updated successfully'));
    }
}
