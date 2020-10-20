<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $projects = Project::all();
        foreach ($products as $product) {
            $product->projects()->toggle([$projects->random()->id, $projects->random()->id, $projects->random()->id,]);
        }
    }
}
