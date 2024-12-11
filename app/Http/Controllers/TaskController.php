<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index()
    {
        $task = Task::all();
        return view('task.index')->with(['tasks'=> $task]);
    }


    public function store(Request $request)
    {
        $request->validate(['title' => 'required' ]);
        Task::create($request->only('title'));
        return redirect('/task');
    }

    public function completed($id){
        $task = Task::find($id);

        if($task){
            $task->completed= !$task->completed;
            $task->save();
            return redirect()->back()->with('success', 'Task status updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Task not found.');
        }
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if($task){
            $task->delete();
            return redirect()->back()->with('success', 'Task deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Task not found.');
        }
    }

    public function getTasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
}
