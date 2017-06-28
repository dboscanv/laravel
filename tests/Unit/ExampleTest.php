<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class ExampleTest extends TestCase
{

    use DatabaseTransactions; // Para que, entre otras cosas,
    // haga rollback de la BD despues del test
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Given = Two records in the database that are posts,
        // and each one is posted a month apart
        $first_post = factory(Post::class)->create();
        $second_post = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);

        //When I fetch the archives
        $posts = Post::archives();

        //Then the response should be in the proper format
        $this->assertCount(2, $posts);
    }
}
