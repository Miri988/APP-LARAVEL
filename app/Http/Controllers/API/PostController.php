<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $post = Post::create ([
            'user_id' => $request -> user() -> id,
            'text' => $request -> get('text'),
            'title' => $request -> get('title'),
        ]);

        return response() -> json($post, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $post = Post::find($request -> route('id'));
        if ($post === null) {
            return response() -> json(['message' => 'post not found'], 404);
        }
        
        if ($request -> user() -> cannot('view', $post)) {
            return response() -> json (
                [
                    'message' => 'У тебя нет прав смотерть эту информацию',
                ],
                403,
            );
        }
        return response() -> json($post, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
