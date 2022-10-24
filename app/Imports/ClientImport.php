<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToModel, WithHeadingRow
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
        $client = new Client();
        foreach($row as $key => $value){
            foreach ($x_default_key as $kk => $vv){
                if($key == $vv){
                    $client->$kk = $value; 
                }
            }  
        }
        $client->created_by = $this->created_by;
        $client->save();

        return $client;
    }
}
