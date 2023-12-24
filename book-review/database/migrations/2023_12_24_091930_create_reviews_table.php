<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('book_id'); // referential integrity: this column refers to the primary key of the book table
            $table->text('review');
            $table->unsignedTinyInteger('rating'); // small int from 0 to 5
            $table->timestamps();
        
            // when a book is deleted, delete all the tables associated with that book id
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            // shorter syntax in Laravel 10:
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
