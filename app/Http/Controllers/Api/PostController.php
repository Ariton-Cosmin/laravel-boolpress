<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->select(
                'posts.id',
                'posts.title',
                'posts.content',
                'post.slug',
                'posts.created_at as date',
                'categories.name as category'
        )
            ->join('categories','posts.category_id','categories.id')
            ->orderBy('posts.id','desc')
            ->paginate(3);

            return response()->json($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        if($post) {
            return response()->json([
                'success' => false,
                'error' => 'Nessun post trovato'
            ]);
        }
    } 
}