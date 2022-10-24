<?php

namespace App\Http\Controllers;

use App\Exports\ClientExport;
use App\Http\Controllers\Controller;
use App\Imports\ClientImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:client,read')->only('index');
        $this->middleware('permission:client,create')->only('create');
        $this->middleware('permission:client,edit')->only('edit');
    }


    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index',compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'phone'    => 'required',
            'address'  => 'required',
        ],[
            'name.required'  =>  __("Name is Required"),
            'email.required' =>  __("Email is Required"),
            'phone.required' =>  __("Phone Number is Required") ,
            'address.required'  =>  __("Address is Required") ,
        ]);


        $client = new Client();
        $client->name          = $request->name;
        $client->email         = $request->email;
        $client->phone         = $request->phone;
        $client->address       = $request->address;
        $client->created_by    = Auth::user()->id;
        $client->save();

        return back()->with('success','Créé avec succès');
    }

    public function update(Request $request,$id)
    {
        session()->put(['id' => $id]);
        $request->validate([
            'edit_name'  => 'required',
            'edit_email' => 'required',
            'edit_phone' => 'required',
            'edit_address'  => 'required',
        ],[
            'edit_name.required'  =>  __("Name is Required") ,
            'edit_email.required' =>  __("Email is Required") ,
            'edit_phone.required' =>  __("Phone Number is Required") ,
            'edit_address.required'  =>  __("Address is Required") ,
        ]);

        session()->forget('id');

        $client = Client::find($id);
        $client->name        = $request->edit_name;
        $client->email       = $request->edit_email;
        $client->phone       = $request->edit_phone;
        $client->address     = $request->edit_address;
        $client->updated_by  = Auth::user()->id;
        $client->save();

        return back()->with('success', __("Updated Successfully") );
    }


    public function delete(Request $request,$id)
    {
        $client = Client::find($id)->delete();

        return back()->with('error', __("Deleted Successfully") );
    }


    public function mass_delete(Request $request)
    {
        $client = Client::find($request->ids);
        $client->each->delete();
        return response()->json(['success' => 'done']);
    }


    public function DateFilter()
    {
        $clients = Client::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.clients.index',compact('clients'));
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
        $header [] = 'address';
        $header [] = 'created_by';
        $header [] = 'updated_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new ClientExport($ids,$header), 'client.xlsx');
    }


    public function pre_import(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.clients.import.import', compact('headings'))->render();
            return response()->json(['data' => $view]);
        }else{
            return response()->json(['error' =>  __("Please enter a valid csv or xlsx file")]);
        }
    }


    public function import(Request $request)
    {
        $data = [];

        foreach(request()->except(['_token','created_by']) as $key => $value){
            $data[$key] = $value;
        }


        Excel::import(new ClientImport($data,$request->created_by), request()->file('file'));

        return back()->withSuccess(__("Client Imported"));
    }
}
