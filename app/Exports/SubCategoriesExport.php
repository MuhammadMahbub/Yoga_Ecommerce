<?php

namespace App\Exports;

use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubCategoriesExport implements FromCollection, WithHeadings
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
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return SubCategory::findMany($this->id);

        return  SubCategory::whereIn('id', $this->id)->get()->map(function($SubCategory){
    
            $field = [];
            
                 
            $field ['id'] = $SubCategory->id;
            $field ['category'] = $SubCategory->category->name;
            $field ['name'] = $SubCategory->name;
            $field ['slug'] = $SubCategory->slug;

            if ($SubCategory->created_by != null) {
                
                $field ['created_by'] = $SubCategory->creator->name;
            } else {
                
                $field ['created_by'] = null;
            }

            if ($SubCategory->updated_by != null) {
                
                $field ['updated_by'] = $SubCategory->modifier->name;
            } else {
                
                $field ['updated_by'] = null;
            }
            
            $field ['created_at'] = $SubCategory->created_at;
            $field ['updated_at'] = $SubCategory->updated_at;

            return $field;

        });  

    }
}
