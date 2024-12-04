<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    /**
     * 全ての投稿を取得
     */
    public function getAllPosts()
    {
        return Post::all();
    }

    /**
     * IDで投稿を取得
     */
    public function findPostById($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * 新しい投稿を作成
     */
    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function updatePostStatus($id, $isPublished)
    {
        $post = Post::findOrFail($id);
        $post->is_published = $isPublished;
        $post->save();
        return $post;
    }
}
