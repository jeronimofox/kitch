<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $projects = Project::all();
        foreach ($users as $user) {
            $user->projects()->toggle([$projects->random()->id, $projects->random()->id, $projects->random()->id,]);
        }
    }
}
