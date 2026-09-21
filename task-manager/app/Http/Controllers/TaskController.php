<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'due_date' => 'nullable|date',
        ]);

        $validated['status'] = 'Pending';
        Task::create($validated);

        return redirect()->intended('/tasks')->with('success', '✅ Task created successfully!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);
        
        return back()->with('success', '✏️ Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return back()->with('success', '🗑️ Task deleted successfully!');
    }

    public function updateStatus(Task $task)
    {
        if ($task->status === 'Pending') {
            $task->status = 'Completed';
            $message = '✅ Task marked as completed!';
        } else {
            $task->status = 'Pending';
            $message = '⏳ Task marked as pending!';
        }
        
        $task->save();
        
        return back()->with('success', $message);
    }
}