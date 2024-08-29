<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function index(){
        $tasks = Task::all();
        return view('status.index',['tasks' => $tasks]);
    }


    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
    //    dd($request);
    $data = $request->validate([
       'title' => ['required '],
        'description' => 'required',
        // 'inprogress' => 'nullable' ,
        // 'complete' => 'nullable',
        'due_date' => ['nullable','date']
    ]);

    // $newTask = Task::create($data);
    $newTask = auth()->user()->tasks()->create($data);
    return redirect(route('status.index'));
    }


    public function edit(Task $task){
        // dd($task);
        return view('task.edit',['task'=>$task]);
    }
    public function update(Task $task ,Request $request){
        $data = $request->validate([
            'title' => ['required '],
             'description' => 'required',
             // 'inprogress' => 'nullable' ,
             // 'complete' => 'nullable',
             'due_date' => ['nullable','date']
         ]);
         $task->update($data);
         return redirect(route('status.index'));
    }


    public function destroy(Task $task){
        // dd($task);
        $task->delete();
        return redirect(route('status.index'));
    }
}
