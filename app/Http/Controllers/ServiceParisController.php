<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassBannerSetting;
use App\Models\ImageForService;
use App\Models\ServiceClassBannerSetting;
use App\Models\ServiceParis;
use App\Models\Team;
use App\Models\TrainerForService;
use Illuminate\Http\Request;
use Str;


class ServiceParisController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:class,read')->only('index');
        $this->middleware('permission:class,create')->only('create');
        $this->middleware('permission:class,edit')->only('edit','ServiceParisPricing');
    }

    public function index(){
       
        if(request()->lowest == 'true')
        {
            $services = ServiceParis::orderBy('price', 'ASC')->paginate(10);
        }
        else if(request()->highest == 'true')
        {
            $services = ServiceParis::orderBy('price', 'DESC')->paginate(10);
        }else
        {
            $services = ServiceParis::orderBy('id', 'DESC')->paginate(10);
        }

        $banner = ServiceClassBannerSetting::first();

        return view('admin.ServiceParis.index', compact('services','banner'));
    }


    public function create(){
        $profesors = Team::latest()->get();
        return view('admin.ServiceParis.create',compact('profesors'));
    }


    public function store(Request $request){

        $request->validate([
            'title.fr'             => 'required',
            'video'                => 'required',
            'date'                 => 'required',
            'time'                 => 'required',
            'short_description.fr' => 'required',
            'description.fr'       => 'required',
            'image'                => 'required|image',
            'file'                 => 'file',
        ],[
            'title.fr.required'                =>   __('Title in french is required'),
            'date.required'                    =>   __('Date is required'),
            'short_description.fr.required'    =>   __('Short description in french is required'),
            'description.fr.required'          =>   __('Description in french is required'),
            'image.required'                   =>   __('Thumbnail Image is required'),
            'image.image'                      =>   __('Unsupportable image type for thumbnail'),
            'file.file'                        =>   __('Unsupportable type for file'),
            'video.required'                   =>   __('La vidéo est requise'),
        ]);

        if ($request->video == null ) {
            $request->validate([
                'galery_image'     => 'required|array|min:4',
                'galery_image.*'   => 'image',
            ],[
               'galery_image.required' => __('Please put gallery image'), 
               'galery_image.min'      => __('If you do not put a video then you have to put minmum 4 image in gallery'), 
               'galery_image.*.image'  => __('Unsuportable file for gallery image'), 
            ]);
        }else {
            $request->validate([
                'galery_image'     => 'required|array|min:3',
                'galery_image.*'   => 'required|image',
            ],[
                'galery_image.required' => __('Please put gallery image'), 
                'galery_image.min'      => __('If you do not put a video then you have to put minmum 3 image in gallery'), 
                'galery_image.*.image'  => __('Unsuportable file for gallery image'), 
            ]);
        }


        $service = new ServiceParis();
        $service->title = $request->title;
        $service->time = $request->time;
        $service->date = $request->date;
        $service->price = $request->price;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->training_duration = $request->training_duration;
        $service->group_size = $request->group_size;
        $service->video = $request->video;
        $service->map = $request->map;
        $service->image = 'image';
        $service->slug = Str::slug($request->title['fr']);
        $service->save();

        
       
        
        if($request->file('image')){
            $image = $request->file('image');
            $fileName = $service->id.'-'.rand(000,999).'.'.$image->extension();
            $image->move(public_path('uploads/services'), $fileName);
            $service->image = $fileName;
            $service->save();
        }

        if($request->file('file')){
            $file = $request->file('file');
            $fileName = $service->id.'-file-'.rand(000,999).'.'.$file->extension();
            $file->move(public_path('uploads/service_files'), $fileName);
            $service->file = $fileName;
            $service->save();
        }

        if ($request->trainer) {
            foreach ($request->trainer as $trainer_id) {
                $trainer_for_class = new TrainerForService();
                $trainer_for_class->service_id = $service->id; 
                $trainer_for_class->trainer_id = $trainer_id; 
                $trainer_for_class->save(); 
            }
        }


        foreach ($request->galery_image as $galery_image) {

            $service_gallery = new ImageForService();
            $service_gallery->service_id = $service->id; 
            $fileName = $service->id.'-'.rand(000,999).'.'.$galery_image->extension();
            $galery_image->move(public_path('uploads/service_gallery'), $fileName);
            $service_gallery->image = $fileName;
            $service_gallery->save();
            
        }



        return redirect()->route('serviceParis.index')->with('success',  __("Created Successfully"));
    }


    public function edit($id){
        $service  = ServiceParis::find($id);
        $current_locale = app()->getLocale();
        $profesors = Team::latest()->get();
        return view('admin.ServiceParis.edit', compact('service','current_locale','profesors'));
    }


    public function update(Request $request,$id){

        $request->validate([
            'title.fr'             => 'required',
            'video'                => 'required',
            'date'                 => 'required',
            'time'                 => 'required',
            'short_description.fr' => 'required',
            'description.fr'       => 'required',
            'image'                => 'image',
            'file'                 => 'file',
        ],[
            'title.fr.required'                =>   __('Title in french is required'),
            'date.required'                    =>   __('Date is required'),
            'short_description.fr.required'    =>   __('Short description in french is required'),
            'description.fr.required'          =>   __('Description in french is required'),
            'image.required'                   =>   __('Thumbnail Image is required'),
            'image.image'                      =>   __('Unsupportable image type for thumbnail'),
            'file.file'                        =>   __('Unsupportable type for file'),
            'video.required'                   =>   __('La vidéo est requise'),
        ]);



        $service = ServiceParis::find($id);
        $service->title = $request->title;
        $service->time = $request->time;
        $service->date = $request->date;
        $service->price = $request->price;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->training_duration = $request->training_duration;
        $service->group_size = $request->group_size;
        $service->video = $request->video;
        $service->map = $request->map;
        $service->save();


        // dd($request->has('image'));

        if($request->has('image')){
            $image = $request->file('image');
            $fileName = $service->id.'-'.rand(000,999).'.'.$image->extension();
            $image->move(public_path('uploads/services'), $fileName);
            $service->image = $fileName;
            $service->save();
        }

        if($request->has('file')){
            $file = $request->file('file');
            $fileName = $service->id.'-file-'.rand(000,999).'.'.$file->extension();
            $file->move(public_path('uploads/service_files'), $fileName);
            $service->file = $fileName;
            $service->save();
        }

        $old_trainer = TrainerForService::where('service_id',$service->id)->get()->each->delete();

        if ($request->trainer) {
            
            foreach ($request->trainer as $trainer_id) {
                $trainer_for_class = new TrainerForService();
                $trainer_for_class->service_id = $service->id; 
                $trainer_for_class->trainer_id = $trainer_id; 
                $trainer_for_class->save(); 
            }
        }


        return redirect()->route('serviceParis.index')->with('success', __("Updated Successfully"));


    }

    

    public function destroy(Request $request){
        ServiceParis::find($request->id)->delete();
        return back()->with('success', __("Deleted Successfully"));
    }



    public function search(Request $request){
        $services = ServiceParis::where('title', 'like', '%'.$request->search.'%')->paginate(10);
        return view('admin.serviceParis.index', compact('services'));
    }


    public function ClassGallery($id)
    {
        $galleries = ImageForService::where('service_id',$id)->orderBy('order','ASC')->get();

        return view('admin.serviceParis.gallery', compact('galleries'));
    }


    public function ClassGalleryStore(Request $request)
    {
      
        $request->validate([
            'galery_image'     => 'required|array',
            'galery_image.*'   => 'image',
        ]);


        foreach ($request->galery_image as $galery_image) {
            $service_gallery = new ImageForService();
            $service_gallery->service_id = $request->service_id; 
            $fileName = $request->service_id.'-'.rand(000,999).'.'.$galery_image->extension();
            $galery_image->move(public_path('uploads/service_gallery'), $fileName);
            $service_gallery->image = $fileName;
            $service_gallery->save();

            // dd($service_gallery);
        }

        return back()->with('success',__('Created succesfully'));
    }



    public function galleryOrderUpdate(Request $request)
    {
        $gallery = ImageForService::find($request->id);
        $gallery->order = $request->order;
        $gallery->save();


        return back()->with('success',__('Updated successfully'));
    }






    public function ClassGalleryUpdate(Request $request,$id)
    {
        $request->validate([
            'galery_image_edit'     => 'required|image'
        ]);

        $galery_image = $request->galery_image_edit;

        $service_gallery = ImageForService::find($id);
        $fileName = $request->service_id.'-'.rand(000,999).'.'.$galery_image->extension();
        $galery_image->move(public_path('uploads/service_gallery'), $fileName);
        $service_gallery->image = $fileName;
        $service_gallery->save();
        

        return back()->with('success',__('Updated succesfully'));
    }


    public function ClassGalleryDelete($id)
    {
        $service_gallery = ImageForService::find($id)->delete();

        return back()->with('success',__('Deleted succesfully'));
    }

}
