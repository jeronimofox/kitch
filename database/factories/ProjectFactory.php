<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $author = User::all()->random();
        return [
            'name' => $this->faker->name,
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'author_id' => $author->id,
            'idea_id' => Idea::all()->random()->id,
            'team_id' => $author->teams->random()->id,
        ];
    }
}
