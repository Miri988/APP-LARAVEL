<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'quantity',
    ];


    protected $table = 'orders';

    public function comment ()
    {
        return $this -> hasMany (Comment::class);
    }

    public function user ()
    {
        return $this -> belongsTo(User::class);
    }
}
