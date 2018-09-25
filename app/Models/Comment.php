<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
           'description' ,'status', 'user_id', 'post_id'
    ];
}
