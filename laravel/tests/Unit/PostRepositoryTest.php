<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Repositories\Post\PostRepositoryInterface;

class PostRepositoryTest extends TestCase
{
    protected $postRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        // PostRepositoryInterface のモック作成
        $this->postRepositoryMock = $this->createMock(PostRepositoryInterface::class);
    }

    public function test_create_post()
    {
        $postData = [
            'title' => 'テストタイトル',
            'content' => 'テスト内容',
            'is_published' => true,
        ];

        // モックの振る舞いを定義
        $this->postRepositoryMock
            ->expects($this->once()) // create メソッドが1回呼ばれることを期待
            ->method('createPost')       // モック対象のメソッド名
            ->with($postData)        // メソッドに渡される引数
            ->willReturn((object) array_merge($postData, ['id' => 1])); // 戻り値

        // メソッド実行
        $createdPost = $this->postRepositoryMock->createPost($postData);

        // 検証
        $this->assertEquals(1, $createdPost->id);
        $this->assertEquals('テストタイトル', $createdPost->title);
        $this->assertTrue($createdPost->is_published);
    }

    public function test_update_post_status()
    {
        $postId = 1;

        // モックの振る舞いを定義
        $this->postRepositoryMock
            ->expects($this->once()) // update メソッドが1回呼ばれることを期待
            ->method('updatePostStatus') // モック対象のメソッド名
            ->with($postId, true)    // 引数
            ->willReturn((object) ['id' => $postId, 'is_published' => true]); // 戻り値

        // メソッド実行
        $updatedPost = $this->postRepositoryMock->updatePostStatus($postId, true);

        // 検証
        $this->assertTrue($updatedPost->is_published);
    }
}