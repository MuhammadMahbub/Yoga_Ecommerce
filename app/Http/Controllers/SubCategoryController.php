<?php

namespace App\Http\Controllers;

use App\Exports\SubCategoriesExport;
use App\Imports\SubCategoriesImport;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Facades\Excel;

class SubCategoryController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('permission:sub_category,read')->only('index');
        $this->middleware('permission:sub_category,create')->only('create');
        $this->middleware('permission:sub_category,edit')->only('edit');
    }


    public function index()
    {
        return view('admin.subcategories.index', [
            'subCategories' => SubCategory::latest()->paginate(10),
            'categories'    => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required',
        ]);

        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return back()->with('success', 'Sub Category Created Successfully');
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        session()->put(['id' => $subcategory->id]);
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,name,'.$subcategory->id,
            'category_id' => 'required',
        ]);



        $subcategory->update([
            'name' => $request->subcategory_name,
            'category_id' => $request->category_id,
        ]);
        session()->forget('id');
        return redirect()->route('subcategories.index')->with('success', 'Sub Category Updated Successfully');
    }

    public function mass_delete(Request $request)
    {
        $categories = SubCategory::find($request->ids);
        $categories->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function preImport(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));  
            $headings = $heading[0][0];
            $view = view('admin.subcategories.imports.csv_header', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' => __('Please enter a valid csv or xlsx file')]);
        }
    }

    public function import(Request $request){
        $data = [];
        foreach(request()->except(['_token', 'file', 'category_id']) as $key => $value){
            $data[$key] = $value;
        } 

        Excel::import(new SubCategoriesImport($data, $request->category_id), request()->file('file'));
             
        return back()->withSuccess(__('Sub Category Imported'));

        
    }

    public function mass_export(Request $request)
    {
        $explode = explode(',', $request->id);
        $ids = [];
        $header = [];
        $header [] = 'id';
        $header [] = 'category';
        $header [] = 'name';
        $header [] = 'slug';
        $header [] = 'created_by';
        $header [] = 'updated_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new SubCategoriesExport($ids,$header), 'subcategories.xlsx');
    }

    public function destroy(SubCategory $subcategory)
    {

        $subcategory->delete();
        return back()->withSuccess('La catégorie a été supprimée avec succès.');
    }

    public function subcategoryDateFilter(){
        $subCategories = SubCategory::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        $categories   = Category::orderBy('name', 'asc')->get();
        return view('admin.subcategories.index', compact('subCategories', 'categories'));


    }

}
