<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // public function getRouteKeyName() {
    //     return 'slug'; //define whick key to use to identify db table
    // }
    protected $fillable = ['title', 'description', 'long_description']; // declare the column to update or create automatically
    // protected $guarded = ['secret']; // declare what is not to update or created automatically (the rest will treated automatically)

    public function toggleComplete(){
        $this->completed = !$this->completed;
        $this->save();
    }
 }
