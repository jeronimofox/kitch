<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'url' => $this->faker->url,
            'author_id' => User::all()->random()->id,
            'project_id' => Project::all()->random()->id,
            'idea_id' => Idea::all()->random()->id
        ];
    }
}
