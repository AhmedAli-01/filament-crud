<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        return [
            'project_id' => Project::factory(), // This creates a project for every task
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => "### " . $this->faker->sentence() . "\n\n" .
                $this->faker->paragraphs(2, true) . "\n\n" .
                "- " . $this->faker->word() . "\n" .
                "- " . $this->faker->word(),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'status' => $this->faker->randomElement(['todo', 'doing', 'done']),
        ];
    }
}
