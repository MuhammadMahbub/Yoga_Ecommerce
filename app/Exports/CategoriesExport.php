<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
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
        // return Category::findMany($this->id);

        return  Category::whereIn('id', $this->id)->get()->map(function($Category){
    
            $field = [];
            
                 
            $field ['id'] = $Category->id;
            $field ['name'] = $Category->name;
            $field ['slug'] = $Category->slug;

            if ($Category->created_by != null) {
                
                $field ['created_by'] = $Category->creator->name;
            } else {
                
                $field ['created_by'] = null;
            }

            if ($Category->updated_by != null) {
                
                $field ['updated_by'] = $Category->modifier->name;
            } else {
                
                $field ['updated_by'] = null;
            }
            
            $field ['created_at'] = $Category->created_at;
            $field ['updated_at'] = $Category->updated_at;

            return $field;

        }); 
    }
}
