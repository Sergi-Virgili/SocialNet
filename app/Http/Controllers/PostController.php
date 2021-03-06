<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Post;
use App\Services\Posts\CreatePostService;
use App\Usecases\Posts\ICreatePost;
use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{

    public function index()
    {
        return new PostCollection(request()->user()->posts);
    }

    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        $user = request()->user();
        $postCreator = new CreatePostService($user, $data);
        $post = $postCreator->execute();

        return new PostResource($post);
    }

}

