<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentExport implements FromCollection, WithHeadings
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
        // return Appointment::all();
        
        return  Appointment::whereIn('id', $this->id)->get()->map(function($Category){
    
            $field = [];
            
                 
            $field ['id'] = $Category->id;
            $field ['name'] = $Category->name;
            $field ['email'] = $Category->email;
            $field ['phone'] = $Category->phone;
            $field ['date_time'] = $Category->date_time;
            $field ['link'] = $Category->link;

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
