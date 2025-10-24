<?php

namespace App\Observers;

use App\Models\RekomRequests;

class RekomRequestObserver
{
    /**
     * Handle the RekomRequests "created" event.
     */
    public function created(RekomRequests $rekomRequests): void
    {
            // Setelah permohonan dibuat, langsung dikirim ke operator
            $rekomRequests->status = 'menunggu_operator';
            $rekomRequests->save();
    }

    /**
     * Handle the RekomRequests "updated" event.
     */
    public function updated(RekomRequests $rekomRequests): void
    {
        //
    }

    /**
     * Handle the RekomRequests "deleted" event.
     */
    public function deleted(RekomRequests $rekomRequests): void
    {
        //
    }

    /**
     * Handle the RekomRequests "restored" event.
     */
    public function restored(RekomRequests $rekomRequests): void
    {
        //
    }

    /**
     * Handle the RekomRequests "force deleted" event.
     */
    public function forceDeleted(RekomRequests $rekomRequests): void
    {
        //
    }
}
