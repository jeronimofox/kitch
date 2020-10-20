<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\IdeaItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IdeaItem::class;

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
            'type' => $this->faker->randomElement(['Brainstorm Sources', 'Notebook', 'Book']),
            'idea_id' => Idea::all()->random()->id,
        ];
    }
}
