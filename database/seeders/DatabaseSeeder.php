<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
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
        User::factory(5)->create()->each(function ($user) {
            Category::factory(5)->create();
            $user->books()->save(Book::factory()->make())->each(function ($book) {
                $book->likes()->save(Like::factory()->make());
            });
        });


        $comment = Comment::create([
            'body' => 'test',
            'user_id' => 1,
            'book_id' => 1
        ]);

        $comment->load(['user', 'book'])->like()->save(Like::factory()->make());
    }
}
