<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


    public function index(){
        $user = Auth::user();
        $tasks = $user->tasks;

        return view('status.index',['tasks' => $tasks]);
    }
    public function progress(){
        $inprogresstasks = Task::where('in_progress', 1)->get();
        return view('status.inprogress',['in_progress' => $inprogresstasks]);
    }

    public function complete(){
        $completeTasks = Task::where('complete', 1)->get();
        return view('status.complete',['complete' => $completeTasks]);
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
    //    dd($request);
    $data = $request->validate([
       'title' => ['required '],
        'description' => 'required',
        'in_progress' => 'boolean' ,
        'complete' => 'boolean',
        'due_date' => ['date']
    ]);

    // $newTask = Task::create($data);
    $newTask = auth()->user()->tasks()->create($data);
    return redirect(route('status.index'))->with('Message', 'Task created!');
    }


    public function edit(Task $task){
        // dd($task);
        return view('task.edit',['task'=>$task]);
    }

    public function update(Task $task ,Request $request){
        $data = $request->validate([
            'title' => ['required '],
             'description' => 'required',
             'in_progress' =>['nullable', 'boolean'],
             'complete' => ['nullable', 'boolean'],
             'due_date' => ['date']
        ]);


        if ($request->has('complete')) {
            $data['complete'] = 1;
            $data['in_progress'] = 0;
        }elseif ($request->has('in_progress')) {
            $data['complete'] = 0;
            $data['in_progress'] = 1;
        } else {
            $data['complete'] = 0;
            $data['in_progress'] = 0;
        }

        $task->update($data);
        return redirect(route('status.index'))->with('Message', 'Task updated!');
    }


    public function destroy(Task $task){
        // dd($task);
        auth()->user()->$task->delete();
        return redirect(route('status.index'))->with('Message', 'Task deleted!');
    }
}
