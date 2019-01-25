<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Post;

class PostRepository implements PostInterface {

    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function getPosts()
    {
        return $this->post->all();
    }

    public function insertPost($title, $body) {
        $post = ['title' => $title, 'body' => $body];
        $this->post->create($post);
        return true;
    }
}