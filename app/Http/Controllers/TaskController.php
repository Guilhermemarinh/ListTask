<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function getTasks()
    {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function postTasks(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    public function deleteTasks($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
}
