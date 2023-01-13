<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;


class BookFactory extends Factory
{
    protected $model = Book::class;
	public function authorId($author)
	{
		return $this->state([
			'author_id' => $author->id,
		]);
	}
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([1, 2, 3]),
			'title' => $this->faker->sentence(),
			'srock' => $this->faker->randomDigit(),
			'description' => $this->faker->paragraph(),
        ];
    }
}
