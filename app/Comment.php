<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ='comments';

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
