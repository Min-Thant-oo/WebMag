<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
        return [
            'email'     => $this->faker->email,
            'subject'   => $this->faker->realText(50),
            'message'   => $this->faker->realText(255),
        ];
    }
}
