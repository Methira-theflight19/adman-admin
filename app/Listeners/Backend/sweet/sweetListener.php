<?php

namespace App\Listeners\Backend\sweet;

use App\Events\Backend\sweet\sweet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sweetListener
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
     * @param  sweet  $event
     * @return void
     */
    public function handle(sweet $event)
    {
        //
    }
}
