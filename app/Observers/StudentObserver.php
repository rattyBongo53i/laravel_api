<?php

namespace App\Observers;

use App\Models\RoyalStudent;
use Illuminate\Support\Facades\Cache;
class StudentObserver
{
    /**
     * Handle the RoyalStudent "created" event.
     *
     * @param  \App\Models\RoyalStudent  $royalStudent
     * @return void
     */
    public function created(RoyalStudent $royalStudent)
    {
        //
        Cache::forget('all-students');
    }

    /**
     * Handle the RoyalStudent "updated" event.
     *
     * @param  \App\Models\RoyalStudent  $royalStudent
     * @return void
     */
    public function updated(RoyalStudent $royalStudent)
    {
        //
        Cache::forget('all-students');

    }

    /**
     * Handle the RoyalStudent "deleted" event.
     *
     * @param  \App\Models\RoyalStudent  $royalStudent
     * @return void
     */
    public function deleted(RoyalStudent $royalStudent)
    {
        //
        Cache::forget('all-students');

    }

    /**
     * Handle the RoyalStudent "restored" event.
     *
     * @param  \App\Models\RoyalStudent  $royalStudent
     * @return void
     */
    public function restored(RoyalStudent $royalStudent)
    {
        //
        Cache::forget('all-students');

    }

    /**
     * Handle the RoyalStudent "force deleted" event.
     *
     * @param  \App\Models\RoyalStudent  $royalStudent
     * @return void
     */
    public function forceDeleted(RoyalStudent $royalStudent)
    {
        //
        Cache::forget('all-students');

    }
}