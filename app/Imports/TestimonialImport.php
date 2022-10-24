<?php

namespace App\Imports;

use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestimonialImport implements ToModel, WithHeadingRow
{
    public $data = []; 
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        $x_default_key = $this->data;  
        $CategoryCreate = new Testimonial();

        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $CategoryCreate->$kk = $value; 
                }
            }  
        } 
        $CategoryCreate->save(); 
        return $CategoryCreate; 
    }
}
