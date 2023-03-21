<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Order ;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    public function index (Request $request)
    {
        return 'message from user:' . $request->query('attribute');
    }

    public function view (Request $request)
    {
        return 'User ID:' . $request->route('id');
    }

    public function viewComment (Request $request)
    {
        $id = $request->route('id');
        $order_id = $request->route('order_id');
        $comment_id = $request->route('comment_id');
        $user = User::find ($id);
        $order = Order::find ($order_id);
        $comment = Comment::find ($comment_id);
        if ($user && $order && $comment) {
            return 
                "User $user -> id, Имя: $user -> firstname, Фамилия $user -> surname, 
                Заказ: $order -> product, Количество $order -> quantity, Комментарий: $comment -> comment";               
        } else {
            return 'Данных нет';
        }
    }
}