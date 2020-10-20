<?php

namespace Tests\Feature\Models;

use App\Models\Team;
use App\Models\TeamMember;
use Tests\TestCase;

class TeamTest extends TestCase
{

    /**
     * test Get all teams
     */
    public function testGetAllTeams()
    {
        $this->assertIsObject((new Team)->all()->each(fn(Team $team) => $this->assertIsObject($team)));
    }

    /**
     * test Get Team By id
     */
    public function testGetTeamById()
    {
        $randomId = rand(Team::all()->first()->id, Team::all()->count());
        $team = Team::find($randomId);

        $this->assertIsObject($team);
        $this->assertIsString($team->name);
        $this->assertIsArray($team->toArray());

    }

    /**
     * test $team->members relationship
     */
    public function testTeamToUserRelationship()
    {
        $team = Team::all()->random();

        $teamMembersDirty = TeamMember::where([
            'team_id' => $team->id,
        ])->get('user_id');

        $teamMembers = $team->members;

        $user = $teamMembers->random();

        $this->assertGreaterThan(0, TeamMember::where([
            'team_id' => $team->id,
            'user_id' => $user->id,
        ])->count());


        $this->assertIsArray($teamMembersDirty->toArray());
        $this->assertNotEmpty($teamMembersDirty);

        $this->assertIsArray($teamMembers->toArray());
        $this->assertNotEmpty($teamMembers);
        $this->assertEquals($teamMembersDirty->count(), $teamMembers->count());

    }

}
