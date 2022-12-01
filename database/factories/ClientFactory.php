<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contact_name' => $this->faker->name(),
            'contact_phone_number' => $this->faker->phoneNumber(),
            'contact_email' => $this->faker->safeEmail(),
            'company_name' => $this->faker->name(),
            'company_address' => $this->faker->streetName() . ' ' . $this->faker->buildingNumber(),
            'company_city' => $this->faker->city(),
            'company_zip' => $this->faker->postcode(),
            'company_vat' => $this->faker->numberBetween(1000, 15000),
        ];
    }
}
