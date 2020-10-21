<?php

namespace Tests\Models;

use App\Models\MembershipInvitation;
use App\Models\Project;
use App\Models\Team;
use PHPUnit\Framework\TestCase;

class MembershipInvitationTest extends TestCase
{

    public function testProject()
    {
        $project = Project::all()->random();
        $invitations = MembershipInvitation::where(['project_id' => $project->id])->get();
        $this->assertEquals($invitations->project(), $project);
    }

    public function testTeam()
    {
        $team = Team::all()->random();
        $invitations = MembershipInvitation::where(['team_id' => $team->id])->get();
        $this->assertEquals($invitations->team(), $team);
    }
}
