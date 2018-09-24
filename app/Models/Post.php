<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
         'user_id' ,'title' ,'summary', 'text', 'slug', 'published_date', 'submitted_date',
        'category_id','image','is_draft','is_posted'
    ];
}
