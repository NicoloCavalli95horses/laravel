<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// we define here a one-to-many relationship (one book can have many reviews stored in the database)
class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class); //define one-to-many relationship
    }
    // define scoped SQL query to fetch data that respect specifics rules
    // call like Book:title('text')->get();
    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title','LIKE','%' . $title . '%');
    }
}
