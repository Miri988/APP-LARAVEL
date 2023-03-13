<?php

namespace App\Http\Controllers\WEB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        
    }
    
    public function active (Request $request)
    {
        $id = $request->route('id');
        $user = User::find ($id);
        if ($user) {
            return 
                "User $user -> id, Имя: $user -> firstname, Фамилия $user -> surname";               
        } else {
            return 'Данных нет';
        }
    }
}