<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    public function getQuestionAttribute()
    {
        return $this->{'question_'.app()->getLocale()};
    }
    public function getAnswerAttribute()
    {
        return $this->{'answer_'.app()->getLocale()};
    }
}
