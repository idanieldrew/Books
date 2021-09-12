<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->name(),
            'slug' => Str::slug($name),
            'editition' => $this->faker->numberBetween(1, 10),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->name(),
            'category_id' => random_int(1,5)
        ];
    }
}
