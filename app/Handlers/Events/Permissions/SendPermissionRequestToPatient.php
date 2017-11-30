<?php

namespace App\Handlers\Events\Permissions;

use App\Events\Permissions\PermissionWasRequested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPermissionRequestToPatient
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PermissionWasRequested  $event
     * @return void
     */
    public function handle(PermissionWasRequested $event)
    {
        //
    }
}
