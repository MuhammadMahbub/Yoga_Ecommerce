<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamUpdateRequest;

class TeamController extends Controller
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
        return view('admin.teams.index', [
            'teams' => Team::latest()->paginate(5),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = Team::create($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('image')){
            $image     = $request->file('image');
            $fileName         = uniqid() .'.'. $image->extension();
            $location         = public_path('uploads/teams');
            $image->move($location, $fileName);
            $team->image = $fileName;
        }

        $team->save();

        return redirect()->route('team.index')->with('success',  __("Created Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        // $team->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        $team->update([
            'name'          => $request->name_edit,
            'thick'         => $request->thick_edit,
            'designation'   => $request->designation_edit,
            'description'   => $request->description_edit,
            'updated_at'    => Carbon::now()
        ]);

        if($request->hasFile('image_edit')){
            $image     = $request->file('image_edit');
            $fileName  = uniqid() .'.'. $image->extension('image_edit');
            $location  = public_path('uploads/teams');
            $image->move($location, $fileName);
            $team->image = $fileName;
        }

        $team->save();
        session()->forget('id');

        return redirect()->route('team.index')->with('success', __("Updated Successfully") );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return back()->with('error',  __("Deleted Successfully"));
    }

    public function mass_delete(Request $request)
    {
        $teams = Team::findMany($request->ids);
        $teams->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function teamDateFilter(){
        $teams = Team::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

}
