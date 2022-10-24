<?php

namespace App\Imports;

use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubCategoriesImport implements  ToModel, WithHeadingRow
{

    public $data = []; 
    public $category_id = '';
    public function __construct($data, $category_id)
    {
        $this->data = $data;
        $this->category_id = $category_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 

        // Insert 
        $x_default_key = $this->data;
        $SubCategoryCreate = new SubCategory();
        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $SubCategoryCreate->$kk = $value; 
                }
            }  
        }
        $SubCategoryCreate->category_id = $this->category_id;
        $SubCategoryCreate->save();
        return $SubCategoryCreate;
    }
    
    
}