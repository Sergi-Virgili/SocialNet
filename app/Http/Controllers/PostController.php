<?php

namespace App\Http\Controllers;

use App\Post;
use App\Usecases\Posts\CreatePost;
use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    public function store() {

        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        $user = request()->user();
        $postCreator = new CreatePost($user, $data);
        $post = $postCreator->execute();

        return new PostResource($post);
    }
}

