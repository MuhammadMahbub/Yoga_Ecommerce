<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array 
    {
        return $this->header; 
    }
    
    public $id = ''; 
    public $header = ''; 
    public function __construct($id,$header)
    {
        $this->id = $id;
        $this->header = $header;
    }

    public function collection()
    {
        return  Order::whereIn('id', $this->id)->get()->map(function($order){
    
            $field = [];
            
                 
            $field ['id']               = $order->id;
            $field ['Order number']     = $order->order_number;
            $field ['Order date']       = $order->order_date;
            $field ['Order status']     = $order->order_status; 
            $field ['Order total']      = $order->order_total; 
            $field ['Payment status']   = $order->payment_status; 
            $field ['Payment method']   = $order->payment_method; 
            $field ['Customer ip']      = $order->customer_ip; 
            $field ['Coupon code']      = $order->coupon_code; 
            $field ['Coupon discount']  = $order->coupon_discount; 
            $field ['Join Class']       = $order->getClass->title ?? '';


            return $field;

        }); 
    }
}
