<?php

namespace App\Listeners;

use App\Events\ClientHired;
use App\Events\PositionCreated;
use App\Services\AvailablePositionsCalculator;
use Illuminate\Events\Dispatcher;

class PositionSubscriber
{
    public function __construct(
        private AvailablePositionsCalculator $calculator,
    ) { }

    /**
     * Handle client hired events.
     */
    public function handleClientHired(ClientHired $event): void {
        $this->calculator->calculate($event->company);
    }

    /**
     * Handle position created events.
     */
    public function handlePositionCreated(PositionCreated $event): void {
        $this->calculator->calculate($event->company);
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            ClientHired::class => 'handleClientHired',
            PositionCreated::class => 'handlePositionCreated',
        ];
    }
}
