<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //  \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name'  => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

         Post::factory(6)->create([
            'user_id' => $user->id
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Post::create([
        //     'title' => 'First post',
        //     'tags' => 'Post, Posting',
        //     'email' => 'euphemiastarcher@gmail.com',
        //     'website' => 'https:www.google.com',
        //     'description' => 'This is some dummy text'

        // ]);

        // Post::create([
        //     'title' => 'Second post',
        //     'tags' => 'Post, Posting, Posting some more',
        //     'email' => 'euphemiastarcherr@gmail.com',
        //     'website' => 'https:www.googler.com',
        //     'description' => 'This is more dummy text'

        // ]);
    }
}
