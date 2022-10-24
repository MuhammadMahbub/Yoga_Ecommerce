<?php

namespace App\Observers;

use App\Models\SubCategory;
use Auth; 
use Str;

class SubCategoryObserver
{
    public function creating(SubCategory $subCategory)
    {
        $subCategory->slug = Str::slug($subCategory->name) . '-' . Str::random(5);
        $subCategory->created_by = Auth::id();
    }

    public function updating(SubCategory $subCategory)
    {
        $subCategory->slug = Str::slug($subCategory->name) . '-' . Str::random(5);
        $subCategory->updated_by = Auth::id();
    }
}
