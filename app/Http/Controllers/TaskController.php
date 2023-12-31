<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return view('tasks.index', compact('task'));
    }
    public function show()
    {
        $task = Task::all();
        return view('tasks.alltask', compact('task'));
    }

    public function create()
    {
        $task = Task::all();
        return view('tasks.create', compact('task'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'taskname' => 'required|string|max:200',
            'description' =>'required',
            'category' =>'required'
        ]);

        Task::create([
            'taskname' => $request->taskname,
            'description' => $request->description,
            'category' => $request->category,
        ]);
        return redirect('tasks/index')->with('message','Task Created successfully!');
    }

    public function edit($task_id)
    {
        $task = Task::all();
        $tasks =Task::find($task_id);
        return view('tasks.edit',compact('tasks','task'));
    }

    public function update(Request $request, $task_id)
    {
        $request->validate([
            'taskname' => 'required|string|max:200',
            'description' =>'required',
            'category' =>'required'
        ]);

        Task::where('id',$task_id)->update([ 'taskname' => $request['taskname'],'description' => $request['description'], 'category' => $request['category']] );

        return redirect('tasks/index')->with('message','Task Updated successfully!');

    }

    public function delete($task_id)
    {
        $tasks =Task::find($task_id);
        if($tasks)
        {
            $tasks->delete();
            
            return redirect('tasks/index');
        }else{
            return redirect('tasks/index');
        
        }
        
     
    }
}


