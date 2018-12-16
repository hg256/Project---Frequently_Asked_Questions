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
        $user = factory(\App\User::class)->make();
        $this->actingAs($user);
        $question = create('App\Question', ['user_id' => auth()->id()]);
        $answer = create('App\Answer', ['question_id' => $question], 2);
        $this->assertFalse($answer[1]->best_reply );
        $this->postJson(route('best-replies.store', [$question, $answer[1]]));
        $this->assertTrue($answer[1]->fresh()->best_reply);
    }

}