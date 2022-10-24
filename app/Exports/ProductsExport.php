<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array 
    {
        return ['id','title','slug','sku','short_description','long_description','image','price','discount','quantity','category_id','created_by','updatd_by','status','created_at','updated_at']; 
    }

    public function collection()
    {
       return Product::all();
    }
}
