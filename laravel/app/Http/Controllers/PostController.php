<?php

namespace App\Http\Controllers;

use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        // サービスから投稿を取得
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // サービスで投稿を作成
        $this->postService->createPost($data);
        return redirect()->route('posts.index');
    }

    public function updateStatus($id,Request $request)
    {
        $data = $request->validate([
            'is_published' => 'required|boolean',  // 公開・非公開のバリデーション
        ]);

        $this->postService->updateStatus($id, $data['is_published']);  // 公開・非公開を切り替え
        return redirect()->back()->with('success', 'ステータスを更新しました！');
    }
}