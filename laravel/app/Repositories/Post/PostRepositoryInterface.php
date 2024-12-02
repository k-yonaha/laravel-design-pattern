<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    /**
     * 全ての投稿を取得
     */
    public function getAllPosts();

    /**
     * IDで投稿を取得
     */
    public function findPostById($id);
    
    /**
     * 新しい投稿を作成
     */
    public function createPost(array $data);
}
