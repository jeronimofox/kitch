<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectIdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (Project::all() as $project) {
            $project->idea()->toggle([Idea::all()->random()->id]);
        }
    }
}
