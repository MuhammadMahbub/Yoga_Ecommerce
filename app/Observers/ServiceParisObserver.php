<?php

namespace App\Observers;

use App\Models\ServiceParis;
use Auth;

class ServiceParisObserver
{
    public function creating(ServiceParis $yogaClass)
    {
        $yogaClass->created_by = Auth::id() ?? 1;
    }

    /**
     * Handle the YogaClass "updated" event.
     *
     * @param  \App\Models\YogaClass  $yogaClass
     * @return void
     */
    public function updating(ServiceParis $yogaClass)
    {
        $yogaClass->updated_by = Auth::id() ?? 1;
    }
}
