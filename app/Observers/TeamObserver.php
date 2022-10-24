<?php

namespace App\Observers;

use App\Models\Shop;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TeamObserver
{
    public function creating(Team $team)
    {
        $slug = Str::slug($team->name) . "-" . Str::random(9);
        $team->slug = $slug;
        $team->created_by = Auth::id();
    }

    public function updating(Team $team)
    {
        $slug = Str::slug($team->name) . "-" . Str::random(9);
        $team->slug = $slug;
        $team->updated_by = Auth::id();
    }
}
