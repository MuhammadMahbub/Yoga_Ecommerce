<?php

namespace App\Exports;

use App\Models\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BlogsExport implements FromCollection, WithHeadings
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
        return  Blog::whereIn('id', $this->id)->get()->map(function($blog){
    
            $field = [];
            
                 
            $field ['id'] = $blog->id;
            $field ['title'] = $blog->title;
            $field ['description'] = $blog->description;
            $field ['meta_title'] = $blog->meta_title;
            $field ['meta_keyword'] = $blog->meta_keyword;
            $field ['meta_description'] = $blog->meta_description;
            $field ['status'] = $blog->status;
            if ($blog->created_by != null) {
                
                $field ['created_by'] = $blog->creator->name;
            } else {
                
                $field ['created_by'] = null;
            }

            if ($blog->updated_by != null) {
                
                $field ['updated_by'] = $blog->modifier->name;
            } else {
                
                $field ['updated_by'] = null;
            }
            
            $field ['created_at'] = $blog->created_at;
            $field ['updated_at'] = $blog->updated_at;

            return $field;

        }); 
    }
}