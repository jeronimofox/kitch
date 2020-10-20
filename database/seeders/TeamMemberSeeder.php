<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $teams = Team::all();
        foreach ($users as $user) {
            $user->teams()->toggle([$teams->random()->id, $teams->random()->id, $teams->random()->id,]);
        }
    }
}
