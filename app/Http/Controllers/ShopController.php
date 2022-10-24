<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\ShopUpdateRequest;
use App\Models\Category;
use App\Models\ShopBanner;
use App\Models\ShopThumb;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:shop,read')->only('index');
        $this->middleware('permission:shop,create')->only('create');
        $this->middleware('permission:shop,edit')->only('edit');
    }

    public function index()
    {
        return view('admin.shops.index', [
            'shops'      => Shop::latest()->paginate(10),
            'current_locale' => app()->getLocale(),
        ]);
    }

    public function shopbanner_index()
    {
        return view('admin.shops.shopbanner_index', [
            'shopbanner'      => ShopBanner::first(),
            'current_locale'  => app()->getLocale(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shopbanner_update(Request $request, $id)
    {
        $request->validate([
            'banner_title.fr' => 'required',
            'banner_image'    => 'image',
        ],[
            'banner_title.fr.required' =>  __("Banner Title is Required in French") ,
        ]);

        $shopbanner = ShopBanner::find($id);

        $shopbanner->update([
            'banner_title' => $request->banner_title,
        ]);

        if($request->hasFile('banner_image')){
            $image     = $request->file('banner_image');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/shops');
            $image->move($location, $fileName);
            $shopbanner->banner_image = $fileName;
        }

        $shopbanner->save();

        return redirect()->route('shopbanner.index')->with('success',  __("Updated Successfully") );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $shop = Shop::create($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('image')){
            $image     = $request->file('image');
            $fileName         = uniqid() .'.'. $image->extension();
            $location         = public_path('uploads/shops');
            $image->move($location, $fileName);
            $shop->image = $fileName;
        }

        if ($request->hasFile('thumb_image')) {
            foreach ($request->file('thumb_image') as $thumb) {
                $location    = public_path('uploads/shops');
                $filename    = uniqid() . '.' . $thumb->extension('thumb_image');
                $thumb->move($location, $filename);

                ShopThumb::insert([
                    'shop_id'       => $shop->id,
                    'thumb_image'   => $filename,
                    'created_at'    => Carbon::now(),
                ]);
            };
        };

        $shop->save();

        return redirect()->route('shop.index')->with('success',  __("Created Successfully") );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('admin.shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopUpdateRequest $request, Shop $shop)
    {
        // $shop->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        $shop->update([
            'category_id'   => $request->category_id_edit,
            'name'          => $request->name_edit,
            'thick'         => $request->thick_edit,
            'price'         => $request->price_edit,
            'description'   => $request->description_edit,
            'updated_at'    => Carbon::now()
        ]);

        if($request->hasFile('image_edit')){
            $image     = $request->file('image_edit');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/shops');
            $image->move($location, $fileName);
            $shop->image = $fileName;
        }

        if ($request->hasFile('thumb_image')) {
            foreach ($request->file('thumb_image') as $thumb) {
                $location    = public_path('uploads/shops');
                $filename    = uniqid() . '.' . $thumb->extension('thumb_image');
                $thumb->move($location, $filename);

                ShopThumb::insert([
                    'shop_id'       => $shop->id,
                    'thumb_image'   => $filename,
                    'updated_at'    => Carbon::now(),
                ]);
            };
        };

        $shop->save();
        session()->forget('id');

        return redirect()->route('shop.index')->with('success',  __("Updated Successfully") );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop_thumb = ShopThumb::findMany($shop->id);
        $shop_thumb->each->delete();
        $shop->delete();
        return back()->with('error', 'Deleted Successfully');
    }

    public function shop_thumb_single_delete(Request $request)
    {
        // dd($request->all());
        $shop_thumb = ShopThumb::find($request->shop_thumb_id);
        $shop_thumb->delete();
        return response()->json(['success' => 'done', 'message' =>  __("Shop Thumb Image Deleted") ]);
    }

    public function mass_delete(Request $request)
    {
        $shops = Shop::findMany($request->ids);
        $shops->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function shopDateFilter(){
        $shops = Shop::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.shops.index', compact('shops'));

    }

}
