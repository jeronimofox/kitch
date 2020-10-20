<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectItem::class;

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
            'type' => $this->faker->randomElement(['Brainstorm Sources', 'Drawing', 'Attachment', 'Notebook', 'Book']),
            'project_id' => Project::all()->random()->id,
        ];
    }
}
