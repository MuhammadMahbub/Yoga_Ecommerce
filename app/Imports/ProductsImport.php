<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductSubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{

    /**
    * @param Collection $collection
    */
    public $data = []; 
    public $category_id = '';
    public $sub_category_id = '';
    public $status = '';
    public $created_by = '';
    public function __construct($data, $category_id, $sub_category_id, $status, $created_by)
    {
        $this->data = $data;
        $this->category_id = $category_id;
        $this->sub_category_id = $sub_category_id;
        $this->status = $status;
        $this->created_by = $created_by;
    }


    public function model(array $row)
    { 
        // Insert 
        $x_default_key = $this->data;
        $ProductCreate = new Product();
        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $ProductCreate->$kk = $value; 
                }
            }  
        }
        $ProductCreate->category_id = $this->category_id;
        $ProductCreate->status = $this->status;
        $ProductCreate->created_by = $this->created_by;
        $ProductCreate->save();

        foreach($this->sub_category_id as $sub_category_id)
        {
            ProductSubCategory::create([
                'product_id' => $ProductCreate->id,
                'sub_category_id' => $sub_category_id,
            ]);
        }

        return $ProductCreate;
    }
}
