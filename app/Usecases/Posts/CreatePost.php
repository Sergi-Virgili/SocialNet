<?php


namespace App\Usecases\Posts;


use App\Post;

class CreatePost
{
    private $data;

    private $user;

    public function __construct($user, $data) {
        $this->data = $data;
        $this->user = $user;
}
    public function execute() : Post {
        $post = $this->user->posts()->create($this->data['data']['attributes']);
        return $post;
    }
}
