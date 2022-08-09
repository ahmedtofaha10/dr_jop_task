<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // category
    public function category()
    {
        return $this->belongsTo(PostCategory::class,'post_category','id');
    }
}
