<?php

namespace Tests\Models;

use Tests\TestCase;

class TeamMemberTest extends TestCase
{

    /**
     * pivot tests
     * todo test create, link, delete, detach methods
     */
    public function testRelated()
    {
        (new TeamTest)->testTeamToUserRelationship();
        (new UserTest)->testUserToTeamRelationship();
    }
}
