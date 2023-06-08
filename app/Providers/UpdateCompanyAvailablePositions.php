<?php

namespace App\Providers;

use App\Providers\PositionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCompanyAvailablePositions
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PositionCreated $event): void
    {
        //
    }
}
