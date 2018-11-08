<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
         'title' ,'slug','status'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
