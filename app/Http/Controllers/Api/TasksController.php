<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Task;
use App\User;
use App\Http\Requests\TaskValidator;
use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\TasksRepository;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * If tasks doesn't exists for the user return a Warning message
     * Else return Tasks and Success message
     *
     * @return \App\Http\Resources\Task
     */
    public function index()
    {
        // Check if user has Tasks else, throw an error
        if ((new UserRepository)->hasTasks()) {
            // Get the tasks of the user
            $tasks = (new TasksRepository)->all();

            // Saving the value of count() in a variable to avoid
            // double call
            $tasksCount = $tasks->count();

            return (new TaskResource($tasks))
               ->additional([
                   'message' =>
                       'Success: You have ' . $tasksCount . ($tasksCount == 1 ? ' task' : ' tasks')
                   ]);
        }

        return response()
            ->json([
                'message'=>
                    'Warning: You don\'t have any tasks yet'
                ]);
    }

    /**
     * Store or Update a newly created resource in storage.
     *
     * @param  App\Http\Requests\TaskValidator  $request
     * @return \App\Http\Resources\Task
     */
    public function store(TaskValidator $request)
    {
        if ($request->isMethod('post')) {
            if ((new UserRepository)->hasLessThanAllowed()) {
                $task = Task::create([
                    'title' => ucfirst($request['title']),
                    'user_id' => Auth::id()
                ]);

                return (new TaskResource($task))
                    ->additional([
                        'message' =>
                            'Task created successfully'
                        ]);
            }
                return response()
                    ->json([
                        'message' =>
                            'Error: You can\'t have more than three tasks'
                        ]);
        }

        $task = Task::find($request->task_id);
        $task->title = $request->title;
        $task->save();

        return (new TaskResource($task))
                    ->additional([
                        'message' =>
                            'Task updated successfully'
                        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Task
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if ($task->delete()) {
            return (new TaskResource($task))
                   ->additional([
                       'message' =>
                           'Success: Task deleted successfully'
                       ]);
        }
    }

    /**
     * Toggles the complete value of a Task
     *
     * @param  int  $id
     * @return \App\Http\Resources\Task
     */
    public function toggleComplete($id)
    {
        // Find the task and toggle the complete value
        $task = Task::findOrFail($id)
            ->toggleComplete();

        return (new TaskResource($task))
            ->additional([
                'message' =>
                    'Task marked as ' . ($task->complete == true ? 'complete' : 'uncomplete')
                ]);
    }
}
