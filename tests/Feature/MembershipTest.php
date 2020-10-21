<?php

namespace App\Tests\Feature;

use App\Models\MembershipInvitation;
use Tests\TestCase;

class MembershipTest extends TestCase
{
    public function testFactory()
    {
        $this->assertIsObject(MembershipInvitation::factory()->create());
        $invitation = MembershipInvitation::factory()->create();
        $this->assertIsObject($invitation);
    }
}
