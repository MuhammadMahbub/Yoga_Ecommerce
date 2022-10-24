<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\YogaStudio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\YogaStudioRequest;
use App\Http\Requests\YogaStudioUpdateRequest;

class YogaStudioController extends Controller
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
        return view('admin.studios.index', [
            'studios' => YogaStudio::latest()->paginate(5),
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
    public function store(YogaStudioRequest $request)
    {
        $studio = YogaStudio::create($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('image')){
            $image     = $request->file('image');
            $fileName         = uniqid() .'.'. $image->extension();
            $location         = public_path('uploads/studios');
            $image->move($location, $fileName);
            $studio->image = $fileName;
        }

        $studio->save();

        return redirect()->route('studio.index')->with('success', __("Created Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YogaStudio  $yogaStudio
     * @return \Illuminate\Http\Response
     */
    public function show(YogaStudio $yogaStudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\YogaStudio  $yogaStudio
     * @return \Illuminate\Http\Response
     */
    public function edit(YogaStudio $yogaStudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\YogaStudio  $yogaStudio
     * @return \Illuminate\Http\Response
     */
    public function update(YogaStudioUpdateRequest $request, YogaStudio $yogaStudio)
    {
        session()->put(['id' => $yogaStudio->id]);
        $yogaStudio->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        if($request->hasFile('image_edit')){
            $image     = $request->file('image_edit');
            $fileName  = uniqid() .'.'. $image->extension('image_edit');
            $location  = public_path('uploads/studios');
            $image->move($location, $fileName);
            $yogaStudio->image = $fileName;
        }
        $yogaStudio->save();
        session()->forget('id');

        return redirect()->route('studio.index')->with('success',  __("Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YogaStudio  $yogaStudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(YogaStudio $yogaStudio)
    {
        $yogaStudio->delete();

        return back()->with('error',  __("Deleted Successfully"));
    }

    public function mass_delete(Request $request)
    {
        $studios = YogaStudio::findMany($request->ids);
        $studios->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function studioDateFilter(){
        $studios = YogaStudio::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.studios.index', compact('studios'));

    }

}
