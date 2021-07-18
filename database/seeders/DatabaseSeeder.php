<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => 'Lorem ipsum dolor sit ament, conosecteur adipiscing elit.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in lacus elit. Duis pulvinar non nibh ut eleifend. Cras vitae lorem non enim ultrices bibendum. Donec eu lorem ac risus commodo fermentum. Pellentesque pretium tempus dui quis consectetur. Curabitur purus eros, auctor ultricies pellentesque at, aliquam sit amet sem.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobbies->id,
            'title' => 'My Hobbies Post',
            'slug' => 'my-hobbies-post',
            'excerpt' => 'Lorem ipsum dolor sit ament, conosecteur adipiscing elit.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in lacus elit. Duis pulvinar non nibh ut eleifend. Cras vitae lorem non enim ultrices bibendum. Donec eu lorem ac risus commodo fermentum. Pellentesque pretium tempus dui quis consectetur. Curabitur purus eros, auctor ultricies pellentesque at, aliquam sit amet sem.'
        ]);
    }
}
