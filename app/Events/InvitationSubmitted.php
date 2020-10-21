<?php

namespace App\Events;

use App\Models\MembershipInvitation;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InvitationSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public MembershipInvitation $invitation;

    /**
     * Create a new event instance.
     *
     * @param $invitation
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }
}
