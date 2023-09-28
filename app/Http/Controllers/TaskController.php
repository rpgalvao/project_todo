<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        
    }

    public function create()
    {
        $categories = Category::all();

        return view('task.create', [
            'categories' => $categories
        ]);
    }

    public function save(Request $request)
    {
        $task = $request->only(['title', 'description', 'due_date', 'user_id','category_id']);
        $task['user_id'] = 1;
        Task::create($task);

        return redirect(route('home'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }
        $categories = Category::all();
        
        return view('task.edit', [
            'categories' => $categories,
            'task' => $task
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        if(!$id) {
            return redirect(route('home'));
        }
        $newTask = $request->only(['title', 'due_date', 'category_id', 'description']);
        $newTask['is_done'] = $request->is_done ? true : false;
        
        $task = Task::find($id);
        $task->update($newTask);
        $task->save();

        return redirect(route('home'));
    }

    public function isDone(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        $task['is_done'] = $request->status;
        $task->save();

        return ['success' => true];
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect(route('home'));
    }
}
