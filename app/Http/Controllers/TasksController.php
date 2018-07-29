<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskValidator;
use App\Repositories\UserRepository;
use App\Repositories\TasksRepository;
use Illuminate\Support\Facades\Validator;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = (new TasksRepository)->all();

            // if ((new UserRepository)->hasTasks()) {
        if (empty(json_decode($tasks))) {
            session()->flash('message', 'You don\'t have any tasks yet');
            return view('tasks.index', compact('tasks'));
        }
            return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TaskValidator  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskValidator $request)
    {
        if ($request->isMethod('post')) {
            if ((new UserRepository)->hasLessThanAllowed()) {
                Task::create([
                    'title' => ucfirst($request['title']),
                    'user_id' => Auth::id()
                ]);

                return redirect('/tasks')
                    ->with('message', 'New task created successfully');
            }

            return redirect('/tasks')
                ->with('error', 'You can\'t have more than three tasks');
        }

        $task = Task::findOrFail($request->id);
        $task->title = $request->title;
        $task->save();
        return redirect('/tasks')->with('message', 'Task updated succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::find($task->id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Task::findOrFail($id)->delete();
          return redirect('/tasks')->with('message', 'Task deleted successfully');
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

        return redirect('tasks')->with('message', 'Task marked as ' . ($task->complete == true ? 'complete' : 'uncomplete'));
    }
}
