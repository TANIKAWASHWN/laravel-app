<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\DateTime; // 追加

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $this->faker = \Faker\Factory::create('ja_JP');

        return [
            'name' => $this->faker->name,
            'tel' => $this->faker->phoneNumber,
            'mail' => $this->faker->safeEmail,
            'title' => $this->faker->realText(50),
            'content' => $this->faker->realText(200),
            'created_at' => $this->faker->dateTimeBetween('-20 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-20 year', 'now'),
        ];
    }
}
