<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return new TaskCollection(Task::all());
    }


    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            // 'title' => 'required|max:225'
        ]);
        $task = Task::create($validated);

        return new TaskResource($task);
    }
}
