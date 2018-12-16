<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Determine if the current answer is marked as the best.
     *
     * @return bool
     */
    public function isBest()
    {
        return $this->question->best_reply_id == $this->id;
    }


}
