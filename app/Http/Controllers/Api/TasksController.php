<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Task as TaskResource;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // If tasks doesn't exists for the user return Warning
        // Else return Tasks and success
        if (!Task::where('user_id', '=', Auth::id())->exists())
        {
         return response()
                ->json([
                    'message'=>
                        'Warning: You don\'t have any tasks yet'
                    ]);
        }

        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return (new TaskResource($tasks))
            ->additional([
                'message' =>
                    'Success'
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $this->validate(request(), [
                'title' => 'required|min:2|max:40'
            ]);

      if ($validator->fails()) {
            return response()
                ->json([
                    'message' =>
                        'Error: You can\'t have more than three tasks',
                    'Errors' =>
                         $validator->errors()
                    ]);
      }

    // If it is a PUT request findOrFail the id, else create a new article
    $task = $request->isMethod('put') ? Article::findOrFail($request->task_id) : new Article;

    if (Task::where('user_id', '=', Auth::id())->count() < 3){
        Task::create([
            'title' => ucfirst($request['title']),
            'user_id' => Auth::id()
        ]);

        return (new TaskResource(Task::latest()->first()))
            ->additional([
                'message' =>
                    'Task Created successfully'
                ]);
    }

     return response()
        ->json([
            'message' =>
                'Error: You can\'t have more than three tasks'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { return 'hola';
      // $validator = Validator::make($request->all(), [
      //     'title' => 'required|min:2|max:40',
      // ]);

      // if ($validator->fails()) {
      //       return response()
      //           ->json([
      //               'message' =>
      //                   'Error: You can\'t have more than three tasks',
      //               'Errors' =>
      //                    $validator->errors()
      //               ]);
      // }
      // $task = Task::find($request->task_id);
      // $task->title = $request->title;
      // $task->save();

      // return (new TaskResource($task))
      //               ->additional([
      //                   'message' =>
      //                       'Task updated successfully'
      //                   ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

         if ($task->delete()) {
             return (new TaskResource($task))
                    ->additional([
                        'message' =>
                            'Task deleted successfully'
                        ]);
         }
    }
    // Add code to handle incorrect $id and merge into a toggle
    public function markAsDone($id)
    {
        $task = Task::findOrFail($id);
        $task->complete = true;
        $task->save();
         return (new TaskResource($task))
                ->additional([
                    'message' =>
                        'Task Marked as Complete'
                    ]);
    }

    public function markAsUndone($id)
    {
        $task = Task::findOrFail($id);
        $task->complete = false;
        $task->save();
         return (new TaskResource($task))
                ->additional([
                    'message' =>
                        'Task Marked as Uncomplete'
                    ]);    }
}
