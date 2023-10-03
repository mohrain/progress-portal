<?php

namespace App\Observers;

use App\Suchi;

class SuchiObserver
{
    public function creating(Suchi $suchi)
    {
        if (auth()->check()) {
            $suchi->user_id = auth()->id();
        }

        // Fill Token Number
        $suchi->token_no = $this->getTokenNumber();

        // Set application date to today's date
        $suchi->application_date = bs_date_today();
        $suchi->fiscal_year_id = running_fiscal_year()->id;

        if ($suchi->reg_date) {
            //TODO: For some reason its not triggering.
            $suchi->reg_date_ad = bs_to_ad($suchi->reg_date);
        }
    }

    public function getTokenNumber()
    {
        $lastToken = Suchi::orderBy('id', 'desc')->first()->token_no ?? '110000';

        return $lastToken + 1;
    }

    /**
     * Handle the Suchi "created" event.
     *
     * @param  \App\Suchi  $suchi
     * @return void
     */
    public function created(Suchi $suchi)
    {
        //
    }

    public function updating(Suchi $suchi)
    {
        if ($suchi->reg_date) {
            $suchi->reg_date_ad = bs_to_ad($suchi->reg_date);
        }
    }

    /**
     * Handle the Suchi "deleted" event.
     *
     * @param  \App\Suchi  $suchi
     * @return void
     */
    public function deleted(Suchi $suchi)
    {
        //
    }

    /**
     * Handle the Suchi "restored" event.
     *
     * @param  \App\Suchi  $suchi
     * @return void
     */
    public function restored(Suchi $suchi)
    {
        //
    }

    /**
     * Handle the Suchi "force deleted" event.
     *
     * @param  \App\Suchi  $suchi
     * @return void
     */
    public function forceDeleted(Suchi $suchi)
    {
        //
    }
}
