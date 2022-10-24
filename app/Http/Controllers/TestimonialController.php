<?php

namespace App\Http\Controllers;

use App\Exports\TestimonialExport;
use App\Http\Requests\TestimonialRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Imports\TestimonialImport;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:testimonial,read')->only('index');
        $this->middleware('permission:testimonial,create')->only('create');
        $this->middleware('permission:testimonial,edit')->only('edit');
    }


    public function index()
    {
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::latest()->paginate(10),
            'current_locale'  => app()->getLocale(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = Testimonial::create(
            [
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'created_at'  => Carbon::now()
            ]
        );
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $imageName);
            $testimonial->image = $imageName;
        }
        $testimonial->save();

        return back()->with('success', __("Created Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialUpdateRequest $request, Testimonial $testimonial)
    {
        $testimonial->name = $request->testimonial_name;
        $testimonial->designation = $request->testimonial_designation;
        $testimonial->description = $request->testimonial_description;
        if($request->hasFile('testimonial_image'))
        {
            $image = $request->file('testimonial_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $imageName);
            $testimonial->image = $imageName;
        }
        $testimonial->save();
        session()->forget('id');


        return back()->with('success', __("Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->with('success',  __("Deleted Successfully"));
    }

    public function mass_export(Request $request)
    {
        $explode = explode(',', $request->id);
        $ids = [];

        $header = [];
        $header [] = 'id';
        $header [] = 'name';
        $header [] = 'designation';
        $header [] = 'description';
        $header [] = 'created_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new TestimonialExport($ids,$header), 'testimonials.xlsx');
    }

    public function testimonialDateFilter(){
        $testimonials = Testimonial::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));


    }

    public function mass_delete(Request $request)
    {
        $categories = Testimonial::find($request->ids);
        $categories->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function preImport(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.testimonials.imports.csv_header', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' => __("Please enter a valid csv or xlsx file")]);
        }
    }

    public function import(Request $request){
        $data = [];
        foreach(request()->except(['_token', 'file']) as $key => $value){
            $data[$key] = $value;
        }
        Excel::import(new TestimonialImport($data), request()->file('file'));

        return back()->withSuccess(__( __("Testimonial Imported")));


    }
}
