<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\Userseed;
use Database\Seeders\Categoryseed;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

		$this->call([
			UserSeed::class,
			CategorySeed::class
		]);

		User::factory(100)->create();
		Author::factory(100)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
