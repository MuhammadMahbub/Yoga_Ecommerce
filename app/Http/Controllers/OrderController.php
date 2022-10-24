<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index', [
            'orders'    => Order::latest()->paginate(10),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.orders.create',[
        'customers' => User::orderBy('name', 'asc')->get(),
        'products' => Product::orderBy('title', 'asc')->get(),
        'coupons'  => Coupon::where('expiry_date' ,'>', date('Y-m-d'))->get(),
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function ordersDestroy(Request $request)
    {
        Order::find($request->id)->delete();
        return back()->with('success',  __("Deleted Successfully") );
    }

    public function orderDateFilter(){
        $from = request()->start_date;
        $to = request()->end_date ?? Carbon::today();
        return view('admin.orders.index', [
            'orders'    => Order::whereBetween('created_at', [$from, $to])->orderBy('id', 'desc')->paginate(10),
        ]);

    }

    public function ordersSearch(){
        $search = request()->search;
        return view('admin.orders.index', [
            'orders'    => Order::where('order_number', 'LIKE', '%'.$search.'%')
                                  ->orWhere('order_status', 'LIKE', '%'.$search.'%')
                                  ->orWhere('order_date', 'LIKE', '%'.$search.'%')
                                  ->orWhere('order_total', 'LIKE', '%'.$search.'%')
                                  ->orWhere('payment_status', 'LIKE', '%'.$search.'%')
                                  ->orWhere('payment_method', 'LIKE', '%'.$search.'%')
                                  ->orWhere('customer_ip', 'LIKE', '%'.$search.'%')
                                  ->orWhere('coupon_code', 'LIKE', '%'.$search.'%')
                                  ->orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function orderBulkDelete(Request $request){
        // dd($request->all());
        $ids = explode(',', $request->delete_id);
        Order::whereIn('id', $ids)->get()->each->delete();
        return back()->with('success', "Deleted Successfully");
    }

    public function mass_export(Request $request){
        $explode = explode(',', $request->id);
        $ids = [];

        $header = [];
        $header [] = 'id';
        $header [] = 'Order number';
        $header [] = 'Order date';
        $header [] = 'Order status';
        $header [] = 'Order total';
        $header [] = 'Payment status';
        $header [] = 'Payment method';
        $header [] = 'Customer ip';
        $header [] = 'Coupon code';
        $header [] = 'Coupon discount';
        $header [] = 'Join Class';
        foreach ($explode as $id) {
            array_push($ids, $id);
        }
        return Excel::download(new OrderExport($ids,$header), 'orders.xlsx');
    }

    public function orderStatusChange(Request $request){
        Order::find($request->id)->update([
            'order_status' => $request->status,
        ]);
        return back()->with('success',  __("Updated Successfully") );
    }
}
