<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating']; //allow mass-assignment for these properties

    public function book() 
    {
        return $this->belongsTo(Book::class); //define many-to-one relationship
    }
}
