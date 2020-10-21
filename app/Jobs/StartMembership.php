<?php

namespace App\Jobs;

use App\Events\InvitationSubmitted;
use Illuminate\Foundation\Bus\Dispatchable;

class StartMembership
{
    use Dispatchable;


    /**
     * Execute the job.
     *
     * @param InvitationSubmitted $event
     * @return void
     */
    public function handle(InvitationSubmitted $event)
    {
        $invitation = $event->invitation;
        $invitation->entity()->create([
            $invitation->membership_entity . '_id' => $invitation->entity_id,
            'user_id' => $invitation->target->id
        ]);
    }
}
