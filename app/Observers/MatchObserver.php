<?php

namespace App\Observers;

use App\Models\MatchGame;
use Illuminate\Support\Facades\Cache;

class MatchObserver
{
    /**
     * Handle the MatchGame "created" event.
     *
     * @param  \App\Models\MatchGame  $matchGame
     * @return void
     */
    public function created(MatchGame $matchGame)
    {
        Cache::forget('all-matches');
    }

    /**
     * Handle the MatchGame "updated" event.
     *
     * @param  \App\Models\MatchGame  $matchGame
     * @return void
     */
    public function updated(MatchGame $matchGame)
    {
        //
        Cache::forget('all-matches');

    }

    /**
     * Handle the MatchGame "deleted" event.
     *
     * @param  \App\Models\MatchGame  $matchGame
     * @return void
     */
    public function deleted(MatchGame $matchGame)
    {
        //
        Cache::forget('all-matches');

    }


    /**
     * Handle the MatchGame "force deleted" event.
     *
     * @param  \App\Models\MatchGame  $matchGame
     * @return void
     */
    public function forceDeleted(MatchGame $matchGame)
    {
        //
        Cache::forget('all-matches');

    }
}
