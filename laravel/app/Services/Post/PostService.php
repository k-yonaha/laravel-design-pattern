<?php

namespace App\Services\Post;

use App\Repositories\Post\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAllPosts();
    }

    public function findPostById($id)
    {
        return $this->postRepository->findPostById($id);
    }

    public function createPost(array $data)
    {
        return $this->postRepository->createPost($data);
    }
}