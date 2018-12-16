<?php
/**
 * Created by PhpStorm.
 * User: himakeerthi
 * Date: 12/15/18
 * Time: 2:35 PM
 */

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class BestReplyTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function a_thread_creator_may_mark_any_reply_as_the_best_reply()
    {
        $this->signIn();
        $question = create('App\Question', ['user_id' => auth()->id()]);
        $answer = create('App\Answer', ['question_id' => $question->id], 2);
        $this->assertFalse($answer[1]->isBest());
        $this->postJson(route('best-replies.store', [$answer[1]->id]));
        $this->assertTrue($answer[1]->fresh()->isBest());
    }

}