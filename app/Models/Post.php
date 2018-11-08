<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
         'user_id' ,'title' ,'summary', 'text', 'slug', 'published_date', 'submitted_date',
        'category_id','main_image','status'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
