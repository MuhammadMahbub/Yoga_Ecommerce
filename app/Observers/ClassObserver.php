<?php

namespace App\Observers;

use App\Models\YogaClass;
use Illuminate\Support\Facades\Auth;

class ClassObserver
{
    /**
     * Handle the YogaClass "created" event.
     *
     * @param  \App\Models\YogaClass  $yogaClass
     * @return void
     */
    public function creating(YogaClass $yogaClass)
    {
        $yogaClass->created_by = Auth::id() ?? 1;
    }

    /**
     * Handle the YogaClass "updated" event.
     *
     * @param  \App\Models\YogaClass  $yogaClass
     * @return void
     */
    public function updating(YogaClass $yogaClass)
    {
        $yogaClass->updated_by = Auth::id() ?? 1;
    }

    /**
     * Handle the YogaClass "deleted" event.
     *
     * @param  \App\Models\YogaClass  $yogaClass
     * @return void
     */
    public function deleted(YogaClass $yogaClass)
    {
        //
    }

    /**
     * Handle the YogaClass "restored" event.
     *
     * @param  \App\Models\YogaClass  $yogaClass
     * @return void
     */
    public function restored(YogaClass $yogaClass)
    {
        //
    }

    /**
     * Handle the YogaClass "force deleted" event.
     *
     * @param  \App\Models\YogaClass  $yogaClass
     * @return void
     */
    public function forceDeleted(YogaClass $yogaClass)
    {
        //
    }
}
