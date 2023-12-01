<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Before;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'posted',
        'category_id',
        'image'
    ];

    public function category(){
        //relacion de muchos a uno
        return $this->belongsTo(Category::class);
    }
    
}
