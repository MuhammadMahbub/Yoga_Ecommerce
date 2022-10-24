<?php

namespace App\Imports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AppointmentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $data = []; 
    public $created_by = '';
    public function __construct($data,$created_by)
    {
        $this->data = $data;
        $this->created_by = $created_by;
    }


    public function model(array $row)
    { 
      
        $x_default_key = $this->data;
        $appointment = new Appointment();
        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $appointment->$kk = $value; 
                }
            }  
        }
        $appointment->created_by = $this->created_by;
        $appointment->save();

        return $appointment;
    }
}
