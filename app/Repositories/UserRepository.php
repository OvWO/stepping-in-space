<?php

namespace App\Repositories;

use Auth;
use App\Task;
use App\User;
use Carbon\Carbon;

class UserRepository
{

    /**
    * Check if the user has Tasks in the
    * database
    * @return boolean
    */
    public function hasTasks()
    {
        return User::findOrFail(Auth::id())->tasks()->exists();
    }

    /**
    * Check if the user has more than three tasks
    * @return boolean
    */
    public function hasLessThanAllowed()
    {
        $allowed = 3;

        $tasks = Task::where('user_id', '=', Auth::id())->count() < $allowed;

        return $tasks->isEmpty() ? false : $tasks;
    }

    /**
    * Get the users that has less than a week of Sign Up
    * @return boolean
    */
    public function newUsers()
    {
        $weekAgo = Carbon::now()->subWeek();
        $users = User::where('created_at', '>=', $weekAgo)
            ->get(['email', 'name']);

        return $users->isEmpty() ? false : $users;
    }
}
