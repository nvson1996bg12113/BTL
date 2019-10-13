<?php

namespace App\collections;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    //
    protected $table = "posts";
    protected $fillable = ['vote','content'];
}
