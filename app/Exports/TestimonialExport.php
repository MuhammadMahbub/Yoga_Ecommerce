<?php

namespace App\Exports;

use App\Models\Testimonial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestimonialExport implements FromCollection, WithHeadings
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
        return  Testimonial::whereIn('id', $this->id)->get()->map(function($testimonial){
    
            $field = [];
            
                 
            $field ['id']          = $testimonial->id;
            $field ['name']        = $testimonial->name;
            $field ['designation'] = $testimonial->designation;
            $field ['description'] = $testimonial->description;
      

            if ($testimonial->created_by != null) {
                
                $field ['created_by'] = $testimonial->creator->name;
            } else {
                
                $field ['created_by'] = null;
            }
            
            $field ['created_at'] = $testimonial->created_at;
            $field ['updated_at'] = $testimonial->updated_at;

            return $field;

        }); 
    }
}
