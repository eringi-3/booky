<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Book;
use Database\Factories\BookFactory;

use Tests\TestCase;

class BookTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        // テスト用のデータを生成してデータベースに挿入
        Book::factory()->count(10)->create();
    }

    public function testIndex()
    {
        // BookControllerのindexメソッドを呼び出す
        $response = $this->get('/books');

        // レスポンスの内容を検証
        $response->assertStatus(200); // 正常なレスポンスが返ってくることを確認
        $response->assertViewIs('books.index'); // 正しいビューが返されることを確認
        $response->assertSee(Book::first()->title); // 最初の本のタイトルがレスポンスに含まれることを確認
    }

    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }
}
