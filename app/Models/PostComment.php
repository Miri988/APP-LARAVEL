<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'posts_comments';

    public function post ()
    {
        return $this -> belongsTo(Post::class);
    }
}
