<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        (new TeamSeeder)->run();
        (new TeamMemberSeeder)->run();
        (new IdeaSeeder)->run();
        (new ProjectSeeder)->run();
        (new ProductSeeder)->run();
        (new ProjectMemberSeeder)->run();
        (new ProjectProductSeeder)->run();
        (new ProjectItemSeeder)->run();
        (new IdeaItemSeeder)->run();
        (new MembershipInvitationSeeder)->run();
    }
}
