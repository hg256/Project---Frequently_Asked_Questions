<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    /**
     * Mark the given answer as the best answer.
     *
     * @param Answer $answer
     */
    public function markBestReply(Answer $answer)
    {
        $this->update(['best_reply_id' => $answer->id]);
    }
}
