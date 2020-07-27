<?php

namespace App\Observers;

use App\Events\LockStatusUpdated;
use App\Lock;

class LockObserver
{
    /**
     * Handle the lock "created" event.
     *
     * @param  \App\Lock  $lock
     * @return void
     */
    public function created(Lock $lock)
    {
        //
    }

    /**
     * Handle the lock "updated" event.
     *
     * @param  \App\Lock  $lock
     * @return void
     */
    public function updated(Lock $lock)
    {
        if($lock->isDirty('status')){
            event(new LockStatusUpdated($lock));
        }
    }

    /**
     * Handle the lock "deleted" event.
     *
     * @param  \App\Lock  $lock
     * @return void
     */
    public function deleted(Lock $lock)
    {
        //
    }

    /**
     * Handle the lock "restored" event.
     *
     * @param  \App\Lock  $lock
     * @return void
     */
    public function restored(Lock $lock)
    {
        //
    }

    /**
     * Handle the lock "force deleted" event.
     *
     * @param  \App\Lock  $lock
     * @return void
     */
    public function forceDeleted(Lock $lock)
    {
        //
    }
}
