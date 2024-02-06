<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user=new User();
        $user->name="Htin Kyaw";
        $user->email="htinkyaw2234@gmail.com";
        $user->slug='htin-kyaw';
        $user->content="Hi I am Programmer working in Ace In";
        $user->password=bcrypt('12345678');
        $user->save();

        $user=new User();
        $user->name="Min Oo";
        $user->email="minoo@gmail.com";
        $user->slug='min-oo';
        $user->content="Hi I am Programmer working in X In";
        $user->password=bcrypt('12345678');
        $user->save();

        $this->call(CategoryTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
