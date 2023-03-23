<?php

namespace App\Models;

use App\Models\User;
use App\Models\PostComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
    ];

    protected $table = 'posts';

    public function user ()
    {
        return $this -> belongsTo(User::class);
    }

    public function comment ()
    {
        return $this -> hasMany(PostComment::class);
    }
}
