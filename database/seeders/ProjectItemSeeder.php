<?php

namespace Database\Seeders;

use App\Models\Project;
use Database\Factories\ProjectItemFactory;
use Illuminate\Database\Seeder;

class ProjectItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Project::all() as $project) {
            $project->items()->create(ProjectItemFactory::times(5)->definition());
        }
    }
}
