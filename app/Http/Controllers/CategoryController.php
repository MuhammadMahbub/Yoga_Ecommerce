<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Imports\CategoriesImport;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:category,read')->only('index');
        $this->middleware('permission:category,create')->only('create');
        $this->middleware('permission:category,edit')->only('edit');
    }

    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::latest()->paginate(10),
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
    public function store(CategoryRequest $request)
    {
        // $cat_name = Category::where('name', $request->name)->first();
        // if($cat_name->exist()){
        //     return back();
        // }

        Category::create([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success',  __("Created Successfully") );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->name = $request->category_name;
        $category->save();

        session()->forget('id');
        return back()->with('success',  __("Updated Successfully") );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->shop_categories->count() > 0) {
            return back()->with('error',  __("This category contains subcategories. Please delete them before you can delete it.") );
        }
        $category->delete();
        return back()->with('error', __("Deleted Successfully") );
    }

    public function mass_delete(Request $request)
    {
        $categories = Category::findMany($request->ids);
        foreach ($categories as $category) {
            // if ($category->subCategories->count() > 0) {
            //     return back()->with('error', 'Cette catégorie contient des sous-catégories. Veuillez les supprimer avant de pouvoir la supprimer.');
            // }
            if ($category->shop_categories->count() > 0) {

                return response()->json(['message' =>  __("This category contains subcategories. Please delete them before you can delete it.") ]);
            }
        }
        $categories->each->delete();
        return response()->json(['message' => 'done']);
    }

    public function mass_export(Request $request)
    {
        $explode = explode(',', $request->id);
        $ids = [];

        $header = [];
        $header [] = 'id';
        $header [] = 'name';
        $header [] = 'slug';
        $header [] = 'created_by';
        $header [] = 'updated_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new CategoriesExport($ids,$header), 'categories.xlsx');
    }

    public function preImport(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.categories.imports.csv_header', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' =>  __("Please enter a valid csv or xlsx file")]);
        }
    }

    public function import(Request $request){
        $data = [];
        foreach(request()->except(['_token', 'file']) as $key => $value){
            $data[$key] = $value;
        }
        Excel::import(new CategoriesImport($data), request()->file('file'));

        return back()->withSuccess( __("Category Imported"));

    }

    public function categoryDateFilter(){
        $categories = Category::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.categories.index', compact('categories'));

    }

  // END
}
