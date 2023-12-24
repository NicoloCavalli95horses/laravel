<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(33)->create()->each(function ($book) {
          $numReviews = random_int(5, 30);
          // create some review for each book   
          Review::factory()
            ->count($numReviews) //create 5-30 review per book
            ->good() //override rating data by creating good ratings
            ->for($book) //create association with the book_id column
            ->create(); // create data
        });
        Book::factory(34)->create()->each(function ($book) {
          $numReviews = random_int(5, 30);
          Review::factory()
            ->count($numReviews)
            ->average()
            ->for($book)
            ->create();
        });
        Book::factory(33)->create()->each(function ($book) {
          $numReviews = random_int(5, 30);
          Review::factory()
            ->count($numReviews)
            ->bad()
            ->for($book)
            ->create();
        });
    }
}
