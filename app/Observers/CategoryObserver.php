<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->slug = Str::slug($category->name)  . '-' . Str::random(5);
        $category->created_by = Auth::id();
    }
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        // $category->created_by = Auth::id();
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */

    public function updating(Category $category)
    {
        $category->slug = Str::slug($category->name)  . '-' . Str::random(5);
        $category->updated_by = Auth::id();
    }
    public function updated(Category $category)
    {
        // $category->updated_by = Auth::id();
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
