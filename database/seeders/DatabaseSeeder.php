<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Théo',
            'email' => 'theoleonet.dev@gmail.com',
        ]);

        \App\Models\Post::factory(30)->create();

        \App\Models\Tag::factory(10)->create();

        $this->call(PostTagRelationshipSeeder::class);
    }
}
