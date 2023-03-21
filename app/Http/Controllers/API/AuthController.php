<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Order ;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends Controller
{
    public function signup (Request $request)
    {
        $user = User::create([
            'name' => $request -> get ('name'),
            'email' => $request -> get ('email'),
            'password' => Hash::make($request -> get('password')), 
        ]);

        $token = $user -> createToken('auth_token') ->plainTextToken;

        return response() -> json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    
}