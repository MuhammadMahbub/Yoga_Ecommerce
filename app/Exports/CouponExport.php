<?php

namespace App\Exports;

use App\Models\Coupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CouponExport implements FromCollection, WithHeadings
{
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
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return  Coupon::whereIn('id', $this->id)->get()->map(function($coupon){
    
            $field = [];
            
                 
            $field ['id'] = $coupon->id;
            $field ['code'] = $coupon->code;
            $field ['type'] = $coupon->type;
            $field ['value'] = $coupon->value;
            $field ['expiry_date'] = $coupon->expiry_date;

            if ($coupon->created_by != null) {
                
                $field ['created_by'] = $coupon->creator->name;
            } else {
                
                $field ['created_by'] = null;
            }

            if ($coupon->updated_by != null) {
                
                $field ['updated_by'] = $coupon->modifier->name;
            } else {
                
                $field ['updated_by'] = null;
            }
            
            $field ['created_at'] = $coupon->created_at;
            $field ['updated_at'] = $coupon->updated_at;

            return $field;

        }); 
    }
}
