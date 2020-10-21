<?php

namespace Database\Seeders;

use App\Events\InvitationSubmitted;
use App\Models\MembershipInvitation;
use Illuminate\Database\Seeder;

class MembershipInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MembershipInvitation::factory(50)
            ->create()
            ->each(
                fn($invitation) => $invitation->has_accepted
                    ? event(new InvitationSubmitted($invitation))
                    : false
            );
    }
}
