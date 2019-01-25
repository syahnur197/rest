<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;

class ArrayPostRepository implements PostInterface {
    private $posts = array(
        [
        'title' => "this is a title 1",
        'body' => "this is body no 1"
        ],
        [
        'title' => "this is a title 2",
        'body' => "this is body no 2"
        ]
    );

    public function getPosts()
    {
        return $this->posts;
    }

    public function insertPost($title, $body) {
        $post = ['title' => $title, 'body' => $body];
        array_push($this->posts, $post);
        return true;
    }
}