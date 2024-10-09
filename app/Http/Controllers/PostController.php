<?php

namespace App\Http\Controllers;

use App\DTOs\postDTO;
use App\services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getPosts();
        return view('post.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        return view('post.show', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'contnt' => 'required',
            'author' => 'required',
        ]);



        $postDTO = new PostDTO($request->title, $request->contnt, $request->author);

        $this->postService->createPost($postDTO);

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = $this->postService->getPostById($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:255',
            'contnt' => 'required',
            'author' => 'required',
        ]);



        $postDTO = new PostDTO($request->title, $request->contnt, $request->author);

        $this->postService->updatePost($id, $postDTO);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return redirect()->route('posts.index');
    }
}
