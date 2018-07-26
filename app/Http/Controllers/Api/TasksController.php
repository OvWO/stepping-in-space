<?php

namespace App\Http\Controllers\Api;
use Auth;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskValidator;
use App\Repositories\TasksRepository;
use \App\Repositories\UserRepository;
// use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Task as TaskResource;

class TasksController extends Controller
{
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
        if ((new UserRepository)->hasTasks())
        {
            // Get the tasks of the user in descending order
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Task
     */
    public function store(TaskValidator $request)
    {
        if ($request->isMethod('post'))
        {
            if ((new UserRepository)->hasLessThanAllowed())
            {
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

    public function toggleComplete($id)
    {
        // Find the task and look if it's true
        $task = Task::findOrFail($id);

        //!!!!!!! Move this code to the Model and make it a toggle. Not a 'set' function
        if ($task->complete) {
            $task->toggleComplete(false);
        } else {
            $task->toggleComplete(true);
        }

         return (new TaskResource($task))
                ->additional([
                    'message' =>
                        'Task marked as ' . ($task->complete == true ? 'complete' : 'uncomplete')
                    ]);    }
}


