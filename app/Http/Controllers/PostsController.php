<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostInterface;

class PostsController extends Controller
{
    private $post;
    public function __construct(PostInterface $post) {
        $this->post = $post;
    }
    
    public function jquery() {
        return view('posts.jquery');
    }
    
    public function ajaxform() {
        return view('posts.ajaxform');
    }
    
    public function axios() {
        return view('posts.axios');
    }

    public function vue() {
        return view('posts.vue');
    }
    
    public function get() {
        return $this->post->getPosts();
    }

    public function add() {
        $title = request()->title;
        $body = request()->body;

        $this->post->insertPost($title, $body);
        return response()->json(['success' => TRUE, 'message' => "$title is successfully added!"]);
    }
}
