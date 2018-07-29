<?php

namespace App\Repositories;

use Auth;
use App\User;
use App\Task;

class UserRepository
{

    /**
    * Check if the user has Tasks in the
    * database
    * @return boolean
    */
    public function hasTasks()
    {
        // return Task::where('user_id', '=', Auth::id())->exists();
        // empty(json_decode($tasks)) check this
        return User::findOrFail(Auth::id())->tasks()->exists();
    }

    /**
    * Check if the user has more than three tasks
    * @return boolean
    */
    public function hasLessThanAllowed()
    {
        $allowed = 3;
        return Task::where('user_id', '=', Auth::id())->count() < $allowed;
    }
}
