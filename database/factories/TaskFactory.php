<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = collect(User::all()->modelKeys());
        $clientIds = collect(Client::all()->modelKeys());
        $projectIds = collect(Project::all()->modelKeys());

        return [
            'user_id' => $userIds->random(),
            'client_id' => $clientIds->random(),
            'project_id' => $projectIds->random(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->realText(150),
            'deadline' => $this->faker->dateTime('+1 month', '+1 year')
        ];
    }
}
