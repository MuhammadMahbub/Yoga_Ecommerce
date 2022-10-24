<?php

namespace App\Observers;

use App\Models\Testimonial;
use Auth;

class TestimonialObserver
{
    public function creating(Testimonial $testimonial)
    {
        $testimonial->created_by = Auth::id();
    }

    public function updating(Testimonial $testimonial)
    {
        $testimonial->updated_by = Auth::id();
    }
}
