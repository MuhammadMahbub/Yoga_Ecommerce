<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\YogaClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassBannerSetting;
use App\Models\ClassPricing;
use App\Models\ImageForClass;
use App\Models\PriceItem;
use App\Models\PriceItemImage;
use App\Models\Team;
use App\Models\TrainerForClass;

class YogaClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:class,read')->only('index');
        $this->middleware('permission:class,create')->only('create');
        $this->middleware('permission:class,edit')->only('edit','yogaclassPricing');
    }

    public function index(){
        if(request()->lowest == 'true')
        {
            $classes = YogaClass::orderBy('price', 'ASC')->paginate(10);
        }
        else if(request()->highest == 'true')
        {
            $classes = YogaClass::orderBy('price', 'DESC')->paginate(10);
        }else
        {
            $classes = YogaClass::orderBy('id', 'DESC')->paginate(10);
        }

        $banner = ClassBannerSetting::first();

        return view('admin.yogaclass.index', compact('classes','banner'));
    }


    public function create(){
        $profesors = Team::latest()->get();
        return view('admin.yogaclass.create',compact('profesors'));
    }


    public function store(Request $request){
        // dd(count($request->trainer));
        $request->validate([
            'title.fr'             => 'required',
            // 'lable.fr'             => 'required',
            // 'subtitle.fr'          => 'required',
            // 'expart_word.fr'       => 'required',
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



        $class = new YogaClass();
        $class->title = $request->title;
        $class->lable = $request->lable;
        $class->subtitle = $request->subtitle;
        $class->expart_word = $request->expart_word;
        $class->time = $request->time;
        $class->date = $request->date;
        $class->price = 0;
        $class->short_description = $request->short_description;
        $class->description = $request->description;
        $class->training_duration = $request->training_duration;
        $class->other_language = $request->other_language;
        $class->group_size = $request->group_size;
        $class->health_hygiene = $request->health_hygiene;
        $class->hosting = $request->hosting;
        $class->place_to_stay = $request->place_to_stay;
        $class->video = $request->video;
        $class->map = $request->map;
        $class->image = 'image';
        $class->save();

        if($request->file('image')){
            $image = $request->file('image');
            $fileName = $class->id.'-'.rand(000,999).'.'.$image->extension();
            $image->move(public_path('uploads/class'), $fileName);
            $class->image = $fileName;
            $class->save();
        }

        if($request->file('file')){
            $file = $request->file('file');
            $fileName = $class->id.'-file-'.rand(000,999).'.'.$file->extension();
            $file->move(public_path('uploads/yoga_files'), $fileName);
            $class->file = $fileName;
            $class->save();
        }

        if ($request->trainer) {
            foreach ($request->trainer as $trainer_id) {
                $trainer_for_class = new TrainerForClass();
                $trainer_for_class->class_id = $class->id; 
                $trainer_for_class->trainer_id = $trainer_id; 
                $trainer_for_class->save(); 
            }
        }


        foreach ($request->galery_image as $galery_image) {

            $class_gallery = new ImageForClass();
            $class_gallery->class_id = $class->id; 
            $fileName = $class->id.'-'.rand(000,999).'.'.$galery_image->extension();
            $galery_image->move(public_path('uploads/class_gallery'), $fileName);
            $class_gallery->image = $fileName;
            $class_gallery->save();
            
        }



        return redirect()->route('yogaclass.index')->with('success',  __("Created Successfully"));
    }


    public function edit($id){
        $class  = YogaClass::find($id);
        $current_locale = app()->getLocale();
        $profesors = Team::latest()->get();
        return view('admin.yogaclass.edit', compact('class','current_locale','profesors'));
    }


    public function update(Request $request){

        $request->validate([
            'title.fr'             => 'required',
            // 'lable.fr'             => 'required',
            // 'subtitle.fr'          => 'required',
            // 'expart_word.fr'       => 'required',
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
            'video.required'                   =>   __('Video is required'),
        ]);

        $class = YogaClass::find($request->id);
        $class->title = $request->title;
        $class->lable = $request->lable;
        $class->subtitle = $request->subtitle;
        $class->expart_word = $request->expart_word;
        $class->time = $request->time;
        $class->date = $request->date;
        $class->price = 0;
        $class->short_description = $request->short_description;
        $class->description = $request->description;
        $class->training_duration = $request->training_duration;
        $class->other_language = $request->other_language;
        $class->group_size = $request->group_size;
        $class->health_hygiene = $request->health_hygiene;
        $class->hosting = $request->hosting;
        $class->place_to_stay = $request->place_to_stay;
        $class->video = $request->video;
        $class->map = $request->map;
        $class->save();

        if($request->file('image')){
            $image = $request->file('image');
            $fileName = $class->id.rand(000,999).'.'.$image->extension();
            $image->move(public_path('uploads/class'), $fileName);
            $class->image = $fileName;
            $class->save();
        }

        if($request->file('file')){
            $file = $request->file('file');
            $fileName = $class->id.'-file-'.rand(000,999).'.'.$file->extension();
            $file->move(public_path('uploads/yoga_files'), $fileName);
            $class->file = $fileName;
            $class->save();
        }

        $old_trainer = TrainerForClass::where('class_id',$class->id)->get()->each->delete();

        if ($request->trainer) {
            
            foreach ($request->trainer as $trainer_id) {
                $trainer_for_class = new TrainerForClass();
                $trainer_for_class->class_id = $class->id; 
                $trainer_for_class->trainer_id = $trainer_id; 
                $trainer_for_class->save(); 
            }
        }


        return redirect()->route('yogaclass.index')->with('success', __("Updated Successfully"));


    }

    

    public function destroy(Request $request){
        YogaClass::find($request->id)->delete();
        return back()->with('success', __("Deleted Successfully"));
    }



    public function search(Request $request){
        $classes = YogaClass::where('title', 'like', '%'.$request->search.'%')->paginate(10);
        $banner = ClassBannerSetting::first();
        return view('admin.yogaclass.index', compact('classes','banner'));
    }



    public function yogaclassPricing($id){
        $class = YogaClass::find($id); 
        $locale = app()->getLocale();
        return view('admin.yogaclass.pricing', compact('class', 'locale'));
    }



    public function classPricingInfoUpdate(Request $request){
         
        $class = YogaClass::find($request->id);
        $class->update([
            'duration_in_days'      => $request->duration_in_days,
            'discount'              => $request->discount,
            'discount_last_date'    => $request->discount_last_date,
        ]);

        return back()->with('success', __('Updated Successfully'));
    }



    public function classPricingDateStore(Request $request){
        $request->validate([
            'arrive_date' => 'required',
        ]);

        $pricing = ClassPricing::create([
            'class_id' => $request->id,
            'arrive_date' => $request->arrive_date,
        ]);

        foreach($request->person as $key => $value){
            $price_item = PriceItem::create([
                'pricing_id'    => $pricing->id,
                'person'        => $value,
                'price'         => $request->price[$key],
                'room_info'     => ['fr' => $request->room_info['fr'][$key], 'en' => $request->room_info['en'][$key]],
                'house_info'    => ['fr' => $request->house_info['fr'][$key], 'en' => $request->house_info['en'][$key]],
            ]); 
            foreach ($request->image[$request->count[$key]] as $multi_image) {
               
                $price_item_image = new PriceItemImage();
                $price_item_image->price_item_id =  $price_item->id;

                $image = $multi_image;
                $fileName = $price_item->id.'-price-item-image-'.rand(000,999).'.'.$image->extension();
                $image->move(public_path('uploads/price_item_image'), $fileName);
                $price_item_image->image = $fileName;

                $price_item_image->save();
            }

        }

        return back()->with('success', __('Created Successfully'));
    }


    public function classPricingAddMore(Request $request){
        foreach($request->person as $key => $value){
            $price_item = PriceItem::create([
                'pricing_id'    => $request->id,
                'person'        => $value,
                'price'         => $request->price[$key],
                'room_info'     => ['fr' => $request->room_info['fr'][$key], 'en' => $request->room_info['en'][$key]],
                'house_info'    => ['fr' => $request->house_info['fr'][$key], 'en' => $request->house_info['en'][$key]],
            ]); 
            foreach ($request->image[$request->count[$key]] as $multi_image) {
                $price_item_image = new PriceItemImage();
                $price_item_image->price_item_id =  $price_item->id;

                $image = $multi_image;
                $fileName = $price_item->id.'-price-item-image-'.rand(000,999).'.'.$image->extension();
                $image->move(public_path('uploads/price_item_image'), $fileName);
                $price_item_image->image = $fileName;

                $price_item_image->save();
            }
        }
        return back()->with('success', __('Created Successfully'));
    }

    public function classPricingItemDelete(Request $request){
        PriceItem::find($request->id)->delete();
        return back()->with('success', __('Deleted Successfully'));
    }

    public function classPricingUpdateMore(Request $request){
        $price_item = PriceItem::find($request->id);
        $price_item->update([ 
            'person'        => $request->person,
            'price'         => $request->price,
            'room_info'     => ['fr' => $request->room_info['fr'], 'en' => $request->room_info['en']],
            'house_info'    => ['fr' => $request->house_info['fr'], 'en' => $request->house_info['en']],
        ]); 
        if($request->file('image')){
            foreach ($request->image as $multi_image) {
                $price_item_image = new PriceItemImage();
                $price_item_image->price_item_id =  $price_item->id;
    
                $image = $multi_image;
                $fileName = $price_item->id.'-price-item-image-'.rand(000,999).'.'.$image->extension();
                $image->move(public_path('uploads/price_item_image'), $fileName);
                $price_item_image->image = $fileName;
    
                $price_item_image->save();
            }
        }

        return back()->with('success', __('Updated Successfully'));

    }



    public function pricingItemImageDelete(Request $request)
    {
        $price_item_image = PriceItemImage::find($request->id)->delete();
    }



    public function classPricingDelete(Request $request){
        ClassPricing::find($request->id)->delete();
        return back()->with('success', __('Deleted Successfully'));
    }



    public function ClassGallery($id)
    {
        $galleries = ImageForClass::where('class_id',$id)->orderBy('order','ASC')->get();
        return view('admin.yogaclass.gallery', compact('galleries'));
    }


    public function ClassGalleryStore(Request $request)
    {
        $request->validate([
            'galery_image'     => 'required|array',
            'galery_image.*'   => 'image',
        ]);


        foreach ($request->galery_image as $galery_image) {
            $class_gallery = new ImageForClass();
            $class_gallery->class_id = $request->class_id; 
            $fileName = $request->class_id.'-'.rand(000,999).'.'.$galery_image->extension();
            $galery_image->move(public_path('uploads/class_gallery'), $fileName);
            $class_gallery->image = $fileName;
            $class_gallery->save();
        }

        return back()->with('success',__('Created succesfully'));
    }



    public function galleryOrderUpdate(Request $request)
    {
        $gallery = ImageForClass::find($request->id);
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

        $class_gallery = ImageForClass::find($id);
        $fileName = $request->class_id.'-'.rand(000,999).'.'.$galery_image->extension();
        $galery_image->move(public_path('uploads/class_gallery'), $fileName);
        $class_gallery->image = $fileName;
        $class_gallery->save();
        

        return back()->with('success',__('Updated succesfully'));
    }


    public function ClassGalleryDelete($id)
    {
        $class_gallery = ImageForClass::find($id)->delete();

        return back()->with('success',__('Deleted succesfully'));
    }
}
