<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $hobbies = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'slug' => 'my-personal-post',
            'title' => 'My Personal Post',
            'excerpt' => 'Lorem, ipsum dolor.',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur fuga dicta voluptatum dolorem ullam inventore ut ratione adipisci nostrum rem nemo, nam ea quaerat! Harum, et eaque. Quia ut maiores minus dolorum? Tenetur dolor dolorem cum reprehenderit voluptate qui praesentium quas iusto quidem voluptates rerum quod, ipsa quis consequuntur, illo dolore inventore modi animi facilis non maxime fugiat, voluptatibus impedit unde. Quia minima dignissimos fugiat unde optio sapiente nostrum earum vel quidem nisi consequuntur ipsa mollitia, dolor exercitationem quasi nobis ipsum saepe quas magnam illum. Earum fugiat officia beatae rerum doloribus aliquam sit obcaecati provident, delectus error amet dicta tempore!'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'slug' => 'my-work-post',
            'title' => 'My Work Post',
            'excerpt' => 'Lorem, ipsum dolor.',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur fuga dicta voluptatum dolorem ullam inventore ut ratione adipisci nostrum rem nemo, nam ea quaerat! Harum, et eaque. Quia ut maiores minus dolorum? Tenetur dolor dolorem cum reprehenderit voluptate qui praesentium quas iusto quidem voluptates rerum quod, ipsa quis consequuntur, illo dolore inventore modi animi facilis non maxime fugiat, voluptatibus impedit unde. Quia minima dignissimos fugiat unde optio sapiente nostrum earum vel quidem nisi consequuntur ipsa mollitia, dolor exercitationem quasi nobis ipsum saepe quas magnam illum. Earum fugiat officia beatae rerum doloribus aliquam sit obcaecati provident, delectus error amet dicta tempore!'
        ]);

    }
}
