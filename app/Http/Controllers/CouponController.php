<?php

namespace App\Http\Controllers;

use App\Exports\CouponExport;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\CouponUpdateRequest;
use App\Imports\CouponImport;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:coupons,read')->only('index');

    }

    public function index()
    {
        return view('admin.coupons.index', [
            'coupons' => Coupon::latest()->paginate(10),
        ]);
    }

    public function store(CouponRequest $request)
    {
        Coupon::create($request->validated());
        return back()->with('success',  __("Created Successfully") );
    }

    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        $coupon->code = $request->coupon_code;
        $coupon->type = $request->coupon_type;
        $coupon->value = $request->coupon_value;
        $coupon->expiry_date = $request->coupon_expiry_date;
        $coupon->save();
        session()->forget('id');
        return back()->with('success',  __("Updated Successfully") );
    }

    public function destroy(Coupon $coupon)
    {

        $coupon->delete();
        return back()->with('error', __("Deleted Successfully") );
    }

    public function mass_delete(Request $request)
    {
        $coupons = Coupon::findMany($request->ids);
        $coupons->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function mass_export(Request $request)
    {
        $explode = explode(',', $request->id);
        $ids = [];

        $header = [];
        $header [] = 'id';
        $header [] = 'code';
        $header [] = 'type';
        $header [] = 'value';
        $header [] = 'expiry_date';
        $header [] = 'created_by';
        $header [] = 'updated_by';
        $header [] = 'created_at';
        $header [] = 'updated_at';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new CouponExport($ids,$header), 'coupons.xlsx');
    }

    public function preImport(Request $request){
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension == 'csv' || $extension == 'xlsx'){
            $heading = (new HeadingRowImport())->toArray($request->file('file'));
            $headings = $heading[0][0];
            $view = view('admin.coupons.imports.csv_header', compact('headings'))->render();
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
        Excel::import(new CouponImport($data, request()->type), request()->file('file'));

        return back()->withSuccess( __("Coupon Imported"));
    }

    public function couponDateFilter(){

        if(request()->start_date != '')
        {
            if(request()->end_date == '')
            {
                request()->end_date = Carbon::now()->addDay();
            }
            else
            {
                request()->end_date = Carbon::parse(request()->end_date)->addDay();
            }
        }


        if(request()->status == 'all')
        {
            $coupons = Coupon::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        }
        if(request()->status == 'active')
        {
            $coupons = Coupon::whereBetween('created_at', [request()->start_date, request()->end_date])->where('expiry_date', '>=', date('Y-m-d'))->paginate(10);
        }
        if(request()->status == 'expired')
        {
            $coupons = Coupon::whereBetween('created_at', [request()->start_date, request()->end_date])->where('expiry_date', '<', date('Y-m-d'))->paginate(10);
        }
        if(request()->start_date == '' && request()->end_date == '')
        {
            if(request()->status == 'all')
            {
                $coupons = Coupon::paginate(10);
            }
            if(request()->status == 'active')
            {
                $coupons = Coupon::where('expiry_date', '>=', date('Y-m-d'))->paginate(10);
            }
            if(request()->status == 'expired')
            {
                $coupons = Coupon::where('expiry_date', '<', date('Y-m-d'))->paginate(10);
            }
        }
        return view('admin.coupons.index', compact('coupons'));
    }

    public function couponCheck(Request $request)
    {
        if($request->coupon_name == 1)
        {
            return response()->json(['coupon_discount' => '0.00']);
        }
        $coupon = Coupon::where('code', $request->coupon_name)->first();
        if($coupon)
        {
            if($coupon->type == 'flat')
            {
                $coupon_discount = $coupon->value . ' €';
            }
            else
            {
                $coupon_discount = $coupon->value . ' %';
            }
        }

        return response()->json([
            'coupon_discount' => $coupon_discount,
        ]);
    }


    // END


}
