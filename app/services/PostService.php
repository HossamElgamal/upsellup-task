<?php

namespace App\services;

use App\DTOs\postDTO;
use App\Models\Post;

class PostService
{
    public function getPosts()
    {
        return Post::all();

    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function createPost(postDTO $postDTO)
    {
        return Post::create([
            'title' => $postDTO->title,
            'content' => $postDTO->contnt,
            'author' => $postDTO->author
        ]);
    }

    public function updatePost($id, postDTO $postDTO)
    {


        $post = Post::findOrFail($id);
        $post->update([
            'title' => $postDTO->title,
            'content' => $postDTO->contnt,
            'author' => $postDTO->author
        ]);

        return $post;
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

}
