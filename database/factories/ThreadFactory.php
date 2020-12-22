<?php

namespace Database\Factories;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'content'=>$this->faker->paragraph,
            'author'=>function () {
                return factory(App\User::class)->create()->name;
            },
            'comments'=>$this->faker->randomDigitNotNull,
            'author_id'=>function () {
                return factory(App\User::class)->create()->id;
            },
        ];
    }
}
