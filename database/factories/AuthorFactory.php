<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory

{
    protected $model = Author::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
			'biography' => $this->faker->paragraph(),
        ];
    }
	public function Configure()
	{
		return $this->afterCreating(function (Author $author) {
			Book::factory(8)->authorId($author)->create();
		});
	}
}

