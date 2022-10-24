<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryBannerSettings;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        $banner = GalleryBannerSettings::first();

        return view('admin.gallery.index',compact('galleries','banner'));
    }



    public function create()
    {
        return view('admin.gallery.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'title'            => 'required',
            'banner_image'     => 'required|image|dimensions:width=1366,height=560',
            'thumbnail'        => 'required|image',
            'gallery_images'   => 'required|array',
            'gallery_images.*' => 'required|image',
        ]); 
        
        
        $gallery =  new Gallery();
        $gallery->title = $request->title;
        $gallery->slug  = Str::slug($request->title).'-'.hexdec(uniqid());
        $gallery->save();

     
        if($request->hasFile('banner_image'))
        {
           $banner_image      = $request->file('banner_image');
           $filename          =  'uploads/gallery/banner/' .$gallery->id . '-galery-baner-image' .'.' . $banner_image->getClientOriginalExtension();
           $location          = public_path('uploads/gallery/banner');
           $banner_image->move( $location, $filename);
           $gallery->banner_image = $filename;
           $gallery->save();
        }
     


        if($request->hasFile('thumbnail'))
        {
           $thumbnail      = $request->file('thumbnail');
           $filename       = 'uploads/gallery/thumbnail/'.$gallery->id .  '-galery-thumbnail-image' .'.' . $thumbnail->getClientOriginalExtension();
           $location       = public_path('uploads/gallery/thumbnail/');
           $thumbnail->move( $location, $filename);
           $gallery->thumbnail = $filename;
           $gallery->save();
        }

      


        foreach ($request->gallery_images as  $key => $gallery_images) {

           $gallery_images_save = new GalleryImage();
           $gallery_images_save->gallery_id = $gallery->id;
           $gallery_images_save->order  = $key +1 ;
           $filename            =  'uploads/gallery/images/'.$gallery->id .'-'. hexdec(uniqid()) .'-gallery-image' .'.' . $gallery_images->getClientOriginalExtension();
           $location            = public_path('uploads/gallery/images');
           $gallery_images->move( $location, $filename);
           $gallery_images_save->image = $filename;
           $gallery_images_save->save();
        }


        return redirect()->route('admin.gallery.index')->with('success',__('Created successfully'));
    }




    public function view($id)
    {
        $gallery = Gallery::find($id);

        return view('admin.gallery.details',compact('gallery'));
    }



    public function edit($id)
    {
        $gallery = Gallery::find($id);

        return view('admin.gallery.edit',compact('gallery'));
    }




    public function update(Request $request,$id)
    {

        $request->validate([
            // 'title'            => 'required',
            'banner_image'     => 'image|dimensions:width=1366,height=560',
            'thumbnail'        => 'image',
            'gallery_images'   => 'array',
            'gallery_images.*' => 'image',
        ]); 
        
        
        $gallery =  Gallery::find($id);
        $gallery->title = $request->title;
        // $gallery->slug  = Str::slug($request->title).'-'.hexdec(uniqid());
        $gallery->save();

     
        if($request->hasFile('banner_image'))
        {
           $banner_image      = $request->file('banner_image');
           $filename          =  'uploads/gallery/banner/' .$gallery->id . '-galery-baner-image' .'.' . $banner_image->getClientOriginalExtension();
           $location          = public_path('uploads/gallery/banner');
           $banner_image->move( $location, $filename);
           $gallery->banner_image = $filename;
           $gallery->save();
        }
     


        if($request->hasFile('thumbnail'))
        {
           $thumbnail      = $request->file('thumbnail');
           $filename       = 'uploads/gallery/thumbnail/'.$gallery->id .  '-galery-thumbnail-image' .'.' . $thumbnail->getClientOriginalExtension();
           $location       = public_path('uploads/gallery/thumbnail/');
           $thumbnail->move( $location, $filename);
           $gallery->thumbnail = $filename;
           $gallery->save();
        }

      

        if ($request->gallery_images != null) {

            $old_last_image = GalleryImage::where('gallery_id',$gallery->id)->orderBy('order','DESC')->first();
            foreach ($request->gallery_images as $key => $gallery_images) {

                if ($old_last_image != null) {
                    $gallery_images_save = new GalleryImage();
                    $gallery_images_save->gallery_id = $gallery->id;
                    $gallery_images_save->order  =  $old_last_image->order + $key+1 ;
                    $filename            =  'uploads/gallery/images/'.$gallery->id .'-'. hexdec(uniqid()) .'-gallery-image' .'.' . $gallery_images->getClientOriginalExtension();
                    $location            = public_path('uploads/gallery/images');
                    $gallery_images->move( $location, $filename);
                    $gallery_images_save->image = $filename;
                    $gallery_images_save->save();
                } else {
                    $gallery_images_save = new GalleryImage();
                    $gallery_images_save->gallery_id = $gallery->id;
                    $gallery_images_save->order  = $key +1 ;
                    $filename            =  'uploads/gallery/images/'.$gallery->id .'-'. hexdec(uniqid()) .'-gallery-image' .'.' . $gallery_images->getClientOriginalExtension();
                    $location            = public_path('uploads/gallery/images');
                    $gallery_images->move( $location, $filename);
                    $gallery_images_save->image = $filename;
                    $gallery_images_save->save();
                }
            }
        }



        return redirect()->route('admin.gallery.index')->with('success',__('Updated successfully'));
       
    }



    public function delete(Request $request,$id)
    {
        $gallery_image = GalleryImage::where('gallery_id',$id)->get()->each->delete();
        $gallery       = Gallery::find($id)->delete();


        return back()->with('success',__('Deleted successfully'));
    }






    public function bannerUpdate(Request $request,$id)
    {
        $request->validate([
            'title.fr' => 'required',
            'image'    => 'image|dimensions:width=1366,height=560',
        ],[
            'title.fr.required' => __('Title in french is required'),
        ]);

        $banner = GalleryBannerSettings::find($id);
        $banner->title = $request->title;

        if ($request->has('image')) {
            $image = $request->file('image');
            $fileName = 'uploads/gallery_banner_image/'.'gallery-banner-'.hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/gallery_banner_image/',$fileName);
            $banner->image = $fileName;
        }
        $banner->save();


        return back()->with('success',__('Updated successfully'));
    }








    public function singleDelete(Request $request)
    {
        GalleryImage::find($request->id)->delete();
    }




    public function imageReorder(Request $request)
    {
        $image = GalleryImage::find($request->id);
        $image->order = $request->order;
        $image->save();

        return response()->json(['success' => 200]);
    }









}
