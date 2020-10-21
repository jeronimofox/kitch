<?php

namespace Database\Factories;

use App\Models\MembershipInvitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class MembershipInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MembershipInvitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $membership_entity = $this->faker->randomElement(['Team', 'Project']);
        $name = "App\Models\\" . $membership_entity;
        $entity = (new $name)->all()->random();
        $has_accepted = $this->faker->boolean;

        return [
            'sender_id' => User::all()->random()->id,
            'target_id' => User::all()->random()->id,
            'entity_id' => $entity->id,
            'membership_entity' => Str::lower($membership_entity),
            'has_accepted' => $has_accepted
        ];
    }
}
