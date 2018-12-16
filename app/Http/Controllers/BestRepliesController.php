<?php
/**
 * Created by PhpStorm.
 * User: himakeerthi
 * Date: 12/15/18
 * Time: 4:03 PM
 */

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
class BestRepliesController extends Controller
{
    /**
     * Mark the best reply for a thread.
     *
     * @param  Answer $answer
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    /*
    public function store($answer)
    {
        $answer = Answer::find($answer);
        $this->authorize('update', $answer->question);
        $answer->question->markBestReply($answer);
    }
*/
    public function store($question,  $answer)
    {
        $answer = Answer::find($answer);
        $answer->best_reply = TRUE;
        $answer->save();
        $question = Question::find($question);
        $question->isBest = TRUE;
        $question->save();
        return redirect()->route('questions.show',['question_id' => $question])->with('message', 'Best Answer Updated!');
    }


}