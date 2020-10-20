<?php

namespace Tests\Models;

use App\Models\TeamMember;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testGetAllUsers()
    {
        $this->assertIsObject((new User)->all()->each(fn(User $user) => $this->assertIsObject($user)));
    }

    public function testGetUserById()
    {
        $randomId = rand(User::all()->first()->id, User::all()->count());
        $user = User::find($randomId);

        $this->assertIsObject($user);
        $this->assertIsString($user->first_name);
        $this->assertIsArray($user->toArray());
    }

    /**
     * test $user->teams relationship
     */
    public function testTeams()
    {
        $user = User::all()->random();

        $userMembershipsDirty = TeamMember::where([
            'user_id' => $user->id,
        ])->get('team_id');

        $userMemberships = $user->teams;

        $team = $userMemberships->random();

        $this->assertGreaterThan(0, TeamMember::where([
            'team_id' => $team->id,
            'user_id' => $user->id,
        ])->count());


        $this->assertIsArray($userMembershipsDirty->toArray());
        $this->assertNotEmpty($userMembershipsDirty);

        $this->assertIsArray($userMemberships->toArray());
        $this->assertNotEmpty($userMemberships);
        $this->assertEquals($userMembershipsDirty->count(), $userMemberships->count());
    }

    public function testProjects()
    {
        $user = User::all()->random();
        $this->assertEquals($user->id, $user->projects->first()->members->first()->id);
    }
}
