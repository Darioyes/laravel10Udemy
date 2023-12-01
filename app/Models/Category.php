<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts(){

        //relacion de uno a muchos
        return $this->hasMany(Post::class);
    }
}
