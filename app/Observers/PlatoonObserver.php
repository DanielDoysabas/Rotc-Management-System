<?php

namespace App\Observers;

use App\Models\Platoon;

class PlatoonObserver
{
    /**
     * Handle the Platoon "created" event.
     *
     * @param  \App\Models\Platoon  $platoon
     * @return void
     */
    public function created(Platoon $platoon)
    {
        //
    }

    /**
     * Handle the Platoon "updated" event.
     *
     * @param  \App\Models\Platoon  $platoon
     * @return void
     */
    public function updated(Platoon $platoon)
    {
        //
    }

    /**
     * Handle the Platoon "deleted" event.
     *
     * @param  \App\Models\Platoon  $platoon
     * @return void
     */
    public function deleted(Platoon $platoon)
    {
        //
    }

    /**
     * Handle the Platoon "restored" event.
     *
     * @param  \App\Models\Platoon  $platoon
     * @return void
     */
    public function restored(Platoon $platoon)
    {
        //
    }

    /**
     * Handle the Platoon "force deleted" event.
     *
     * @param  \App\Models\Platoon  $platoon
     * @return void
     */
    public function forceDeleted(Platoon $platoon)
    {
        //
    }
}
