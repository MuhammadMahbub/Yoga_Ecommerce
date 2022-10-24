<?php

namespace App\Imports;

use App\Models\Blog;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlogsImport implements ToModel, WithHeadingRow
{

    /**
    * @param Collection $collection
    */
    public $data = []; 
    public $status = '';
    public $created_by = '';
    public function __construct($data, $status, $created_by)
    {
        $this->data = $data;
        $this->status = $status;
        $this->created_by = $created_by;
    }


    public function model(array $row)
    { 
        // Insert 
        $x_default_key = $this->data;
        $BlogCreate = new Blog();
        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $BlogCreate->$kk = $value; 
                }
            }  
        }
        $BlogCreate->status = $this->status;
        $BlogCreate->created_by = $this->created_by;
        $BlogCreate->save();
        return $BlogCreate;
    }
}
