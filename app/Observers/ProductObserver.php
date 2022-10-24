<?php

namespace App\Observers;

use App\Models\Product;
use Auth; 
use Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->slug = Str::slug($product->name)  . '-' . Str::random(5);
        $product->created_by = Auth::id();
    }

    
    public function updating(Product $product)
    {
        $product->slug = Str::slug($product->name)  . '-' . Str::random(5);
        $product->updated_by = Auth::id();
    }
}
