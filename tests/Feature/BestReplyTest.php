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
    function a_question_creator_may_mark_any_answer_as_the_best_answer()
    {
        $this->signIn();
        $question = create('App\Question', ['user_id' => auth()->id()]);
        $answer = create('App\Answer', ['question_id' => $question, 'user_id' =>$question->id], 2);
        $this->assertEquals($answer[1]->best_reply, null);
        $this->postJson(route('best-replies.store', [$question, $answer[1]]));
        $this->assertEquals($answer[1]->fresh()->best_reply, 1);

    }

}