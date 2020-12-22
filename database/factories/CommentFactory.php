<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->paragraph,
            'author'=>function () {
                return factory(App\User::class)->create()->name;
            },
            'author_id'=>function () {
                return factory(App\User::class)->create()->id;
            },
            'thread_id'=>function () {
                return factory(App\Thread::class)->create()->id;
            },
        ];
    }
}
