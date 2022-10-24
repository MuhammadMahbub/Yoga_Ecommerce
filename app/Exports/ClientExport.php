<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport implements FromCollection, WithHeadings
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
        return  Client::whereIn('id', $this->id)->get()->map(function($client){
    
            $field = [];
            
                 
            $field ['id'] = $client->id;
            $field ['name'] = $client->name;
            $field ['email'] = $client->email;
            $field ['phone'] = $client->phone;
            $field ['address'] = $client->address;
            if ($client->created_by != null) {
                
                $field ['created_by'] = $client->creator->name;
            } else {
                
                $field ['created_by'] = null;
            }

            if ($client->updated_by != null) {
                
                $field ['updated_by'] = $client->modifier->name;
            } else {
                
                $field ['updated_by'] = null;
            }
            
            $field ['created_at'] = $client->created_at;
            $field ['updated_at'] = $client->updated_at;

            return $field;

        }); 
    }
}
