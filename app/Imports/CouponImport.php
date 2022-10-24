<?php

namespace App\Imports;

use App\Models\Coupon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CouponImport implements ToModel, WithHeadingRow
{
    public $data = []; 
    public $type = '';
    public function __construct($data, $type)
    {
        $this->data = $data;
        $this->type = $type;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        $x_default_key = $this->data;  
        $couponCreate = new Coupon();

        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $couponCreate->$kk = $value; 
                }
            }  
        } 

        $couponCreate->type = $this->type;
        $couponCreate->save(); 
        return $couponCreate; 
    }
}
