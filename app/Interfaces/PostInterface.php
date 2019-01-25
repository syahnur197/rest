<?php 
namespace App\Interfaces;

interface PostInterface {

    public function getPosts();

    public function insertPost($title, $body);
}