<?php

namespace App\Http\Controllers;

use App\Exports\BlogsExport;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Imports\BlogsImoport;
use App\Imports\BlogsImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class BlogController extends Controller
{

    public function constructor()
    {
        $this->middleware('permission:blogs,read')->only('index');
        $this->middleware('permission:blogs,create')->only('create');
        $this->middleware('permission:blogs,edit')->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_locale = app()->getLocale();
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index',compact('blogs','current_locale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create([
            'title'               => $request->title,
            'short_description'   => $request->short_description,
            'description'         => $request->description,
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'meta_keyword'        => $request->meta_keyword,
            'status'              => $request->status,
            'created_at'          => Carbon::now(),
        ]);

        if($request->hasFile('image'))
        {
           $image      = $request->file('image');
           $filename   = time() . '.' . $image->getClientOriginalExtension();
           $location   = public_path('uploads/blogs/');
           $image->move( $location, $filename);
           $blog->image = $filename;
           $blog->save();
        }

        return redirect()->route('blogs.index')->with('success', __("Created Successfully"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $current_locale = app()->getLocale();
        return view('admin.blogs.edit',compact('blog','current_locale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update([
            'title'               => $request->title,
            'short_description'   => $request->short_description,
            'description'         => $request->description,
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'meta_keyword'        => $request->meta_keyword,
            'status'              => $request->status,
            'updated_at'          => Carbon::now(),
        ]);

        if($request->hasFile('image'))
        {
           $image      = $request->file('image');
           $filename   = time() . '.' . $image->getClientOriginalExtension();
           $location   = public_path('uploads/blogs/');
           $image->move( $location, $filename);
           $blog->image = $filename;
           $blog->save();
        }

        return redirect()->route('blogs.index')->with('success', __("Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', __("Deleted Successfully"));
    }

    public function blogSearch(Request $request)
    {
        $blogs = Blog::where('title', 'like', '%'.$request->search.'%')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function preImport(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.blogs.imports.csv_header', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' => __("Please enter a valid csv or xlsx file")]);
        }
    }

    public function import(Request $request){
        $data = [];
        foreach(request()->except(['_token', 'file', 'status', 'created_by']) as $key => $value){
            $data[$key] = $value;
        }

        Excel::import(new BlogsImport($data, $request->status, $request->created_by), request()->file('file'));

        return back()->withSuccess(__("Blogs Imported"));


    }


    public function mass_export(Request $request)
    {
        $ids = Blog::all()->pluck('id')->toArray();

        $header = [];
        $header [] = 'id';
        $header [] = 'title';
        $header [] = 'description';
        $header [] = 'meta_title';
        $header [] = 'meta_keyword';
        $header [] = 'meta_description';
        $header [] = 'status';
        $header [] = 'created_by';
        $header [] = 'updated_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';

        return Excel::download(new BlogsExport($ids,$header), 'blogs.xlsx');
    }
}
