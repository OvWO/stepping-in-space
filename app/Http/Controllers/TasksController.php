<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $tasks = Task::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();
        /*->paginate(7)*/

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:2'
        ]);

        // return Auth::id();

        // $task = new Task;
        // $task->title = request('title');
        // $task->user_id = Auth::id();
        // $task->save();


        Task::create([
            'title' => ucfirst($request['title']),
            'user_id' => Auth::id()
        ]);

        // session()->flash('message', 'New task created successfully');

        return redirect('/tasks')
            ->with('message', 'New task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('tasks.show', compact('task'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $validator = Validator::make($request->all(), [
          'title' => 'required|max:255',
      ]);

      // if ($validator->fails()) {
      //     return redirect('/tasklist/'.$request->id)
      //         ->withInput()
      //         ->withErrors($validator);
      // }

      // dump ($id);
      // dump ($request);

      $task = Task::find($id);
      $task->title = $request->title;
      $task->save();
      return redirect('/tasks')->with('message', 'Task updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                  var_dump('hola');
          Task::findOrFail($id)->delete();
          return redirect('/tasks')->with('message', 'Task has been deleted!!');
    }

    public function markAsDone($id)
    {
        $task = Task::find($id);
        $task->complete = true;
            // dump(Task::find($id)
            // ->complete);
        $task->save();
        return redirect('tasks');
    }

    public function markAsUndone($id)
    {
        $task = Task::find($id);
        $task->complete = false;
            // dump(Task::find($id)
            // ->complete);
        $task->save();
        return redirect('tasks');
    }
}
