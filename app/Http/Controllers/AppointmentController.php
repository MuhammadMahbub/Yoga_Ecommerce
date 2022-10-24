<?php

namespace App\Http\Controllers;

use App\Exports\AppointmentExport;
use App\Http\Controllers\Controller;
use App\Imports\AppointmentImport;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:appointment,read')->only('index');
        $this->middleware('permission:appointment,create')->only('create');
        $this->middleware('permission:appointment,edit')->only('edit');
    }


    public function index()
    {
        $appointments = Appointment::latest()->paginate(10);
        return view('admin.appointment.index',compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date'  => 'required',
        ],[
            'name.required'  => __("Name is Required") ,
            'email.required' =>  __("Email is Required"),
            'phone.required' =>  __("Phone Number is Required"),
            'date.required'  =>  __("Date is Required"),
        ]);


        $appointment = new Appointment();
        $appointment->name      = $request->name;
        $appointment->email     = $request->email;
        $appointment->phone     = $request->phone;
        $appointment->date_time = $request->date;
        $appointment->link      = $request->link;
        $appointment->save();

        return back()->with('success', __("Created Susseccfully") );
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date'  => 'required',
        ],[
            'name.required'  => __("Name is Required") ,
            'email.required' => __("Email is Required") ,
            'phone.required' => __("Phone Number is Required") ,
            'date.required'  => __("Date is Required") ,
        ]);

        $appointment = Appointment::find($id);
        $appointment->name      = $request->name;
        $appointment->email     = $request->email;
        $appointment->phone     = $request->phone;
        $appointment->date_time = $request->date;
        $appointment->link      = $request->link;
        $appointment->save();

        return back()->with('success',__("Updated Successfully") );
    }


    public function delete(Request $request,$id)
    {
        $appointment = Appointment::find($id)->delete();

        return back()->with('error',__("Deleted Successfully") );
    }


    public function mass_delete(Request $request)
    {
        $appointment = Appointment::find($request->ids);
        $appointment->each->delete();
        return response()->json(['success' => 'done']);
    }


    public function DateFilter()
    {
        $appointments = Appointment::whereBetween('date_time', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.appointment.index',compact('appointments'));
    }

    public function mass_export(Request $request)
    {
        $explode = explode(',', $request->id);
        $ids = [];

        $header = [];
        $header [] = 'id';
        $header [] = 'name';
        $header [] = 'email';
        $header [] = 'phone';
        $header [] = 'date_time';
        $header [] = 'link';
        $header [] = 'created_by';
        $header [] = 'updated_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new AppointmentExport($ids,$header), 'appointment.xlsx');
    }


    public function pre_import(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.appointment.import.import', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' =>__("Please enter a valid csv or xlsx file")]);
        }
    }


    public function import(Request $request)
    {
        $data = [];

        foreach(request()->except(['_token','created_by']) as $key => $value){
            $data[$key] = $value;
        }


        Excel::import(new AppointmentImport($data,$request->created_by), request()->file('file'));

        return back()->withSuccess(__("Appointment Imported"));
    }
}
