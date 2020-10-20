<?php

namespace Database\Seeders;

use App\Models\IdeaItem;
use Illuminate\Database\Seeder;

class IdeaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdeaItem::factory(200)->create();
    }
}
