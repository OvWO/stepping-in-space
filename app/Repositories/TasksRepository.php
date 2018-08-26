<?php

namespace App\Repositories;

use Auth;
use App\Task;

/**
* A set of common Task model functions along the project
*/
class TasksRepository
{

    /**
     * Show all the User Tasks in descending order
     * @return \App\Task
     */
    public function all()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return $tasks->isEmpty() ? false : $tasks;
    }
}
