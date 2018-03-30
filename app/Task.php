<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table ='tasks';

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($q)
    {
        $id = \Auth::user()->id;

        if(auth()->user()->hasRole('declarant'))
        {
            return empty(request()->search) ? $q : $q->where('title', 'like', '%'.request()->search.'%')->where('user_id', $id);
        }
        else
        {
            return empty(request()->search) ? $q : $q->where('title', 'like', '%'.request()->search.'%');
        }
    }
}
