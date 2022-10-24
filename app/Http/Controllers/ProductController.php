<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\ProductSubCategory;
use App\Models\ProductMultipleImage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;
use Maatwebsite\Excel\HeadingRowImport;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('permission:products,read')->only('index');
        $this->middleware('permission:products,create')->only('create');
        $this->middleware('permission:products,edit')->only('edit');
    }


    public function index($data = '')
    {
        // dd(request()->all());
        if(request()->active == 'true')
        {
            $products = Product::where('status', 'active')->orderBy('id', 'DESC')->paginate(10);
        }
        if(request()->lowest == 'true')
        {
            $products = Product::orderBy('price', 'ASC')->paginate(10);

        }
        if(request()->highest == 'true')
        {
            $products = Product::orderBy('price', 'DESC')->paginate(10);
        }
        // Check if request is empty
        if(request()->all() == [])
        {
            $products = Product::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->short_description);
         $product = Product::create([

            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sku' => $request->sku,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'discount'    => $request->discount,
         ]);

         foreach($request->subcategory_id as $subcategory) {

            ProductSubCategory::create([
                'product_id' => $product->id,
                'sub_category_id' => $subcategory,
            ]);
         }

         if($request->hasFile('image'))
         {
            $image      = $request->file('image');
            $filename   = time() . '.' . $image->getClientOriginalExtension();
            $location   = public_path('uploads/products/');
            $image->move( $location, $filename);
            $product->image = $filename;
            $product->save();
         }

         if($request->gallery)
         {
            foreach($request->gallery as $key => $gallery)
            {
                // upload images
                $filename   = $product->id. '-' . $key + 1 . '.' . $gallery->getClientOriginalExtension();
                $location   = public_path('uploads/products/gallery/');
                $gallery->move($location, $filename);
                // save images to database
                ProductMultipleImage::create([
                    'product_id' => $product->id,
                    'product_image' => $filename,
                ]);
            }
         }

            return redirect()->route('products.index')->with('success',  __("Created Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $product->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sku' => $request->sku,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'discount'    => $request->discount,
            'status' => $request->status,
        ]);



        $product->sub_category()->delete();
        foreach($request->subcategory_id as $subcategory) {

            ProductSubCategory::create([
                'product_id' => $product->id,
                'sub_category_id' => $subcategory,
            ]);
         }
         if($request->hasFile('image'))
         {
            $image      = $request->file('image');
            $filename   = time() . '.' . $image->getClientOriginalExtension();
            $location   = public_path('uploads/products/');
            $image->move( $location, $filename);
            $product->image = $filename;
            $product->save();
         }
         if($request->gallery)
         {
            foreach($request->gallery as $key => $gallery)
            {
                // upload images
                $filename   = $product->id. '-' . $key + 1 . '-' . Str::random(5) .  '.' .$gallery->getClientOriginalExtension();
                $location   = public_path('uploads/products/gallery/');
                $gallery->move($location, $filename);
                // save images to database
                ProductMultipleImage::create([
                    'product_id' => $product->id,
                    'product_image' => $filename,
                ]);
            }
         }
         return redirect()->route('products.index')->with('success', __("Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->sub_category()->delete();
        $product->gallery()->delete();
        $product->delete();
        return redirect()->route('products.index')->with('error', __("Deleted Successfully"));
    }

    public function getsubcategory(Request $request)
    {
        try
        {
            $category = Category::find($request->id);
            $subcategories = $category->subCategories;
        } catch (Exception $e) {

           return '<option selected value="">Nothing Found</option>';
           exit;
        }

        $options = '';
        foreach($subcategories as $key => $subcategory)
        {
            if($key == 0)
            {

                $options .=  '<option selected value="'.$subcategory->id .'">'.$subcategory->name.'</option>';
            }
            else
            {
                $options .=  '<option value="'.$subcategory->id .'">'.$subcategory->name.'</option>';
            }
        }

        return $options;

    }

    public function gallery_delete(Request $request)
    {
        $image = ProductMultipleImage::find($request->id);
        $image->delete();
        return response()->json(['success' =>  __("Deleted Successfully")]);
    }

    public function productSearch(Request $request)
    {
        $products = Product::where('title', 'like', '%'.$request->search.'%')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function preImport(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.products.imports.csv_header', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' => __('Please enter a valid csv or xlsx file')]);
        }
    }

    public function import(Request $request){
        $data = [];
        foreach(request()->except(['_token', 'file', 'category_id', 'sub_category_id', 'status', 'created_by']) as $key => $value){
            $data[$key] = $value;
        }

        Excel::import(new ProductsImport($data, $request->category_id, $request->sub_category_id, $request->status, $request->created_by), request()->file('file'));

        return back()->withSuccess(__('Sub Category Imported'));


    }


    public function mass_export(Request $request)
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

}






















