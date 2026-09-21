@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div style="background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto;">
    
    <h2 style="color: #333; margin-bottom: 30px; font-size: 28px;">✏️ Edit Task</h2>

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Task Name -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Task Name *</label>
            <input type="text" name="task_name" value="{{ $task->task_name }}" 
                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; font-family: inherit;"
                placeholder="Enter task name" required>
            @error('task_name')
                <span style="color: #dc3545; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Description</label>
            <textarea name="description" placeholder="Enter task description"
                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; font-family: inherit; min-height: 100px; resize: vertical;">{{ $task->description }}</textarea>
            @error('description')
                <span style="color: #dc3545; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Due Date -->
        <div style="margin-bottom: 30px;">
            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Due Date</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}"
                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; font-family: inherit;">
            @error('due_date')
                <span style="color: #dc3545; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Buttons -->
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #0066cc; color: white; padding: 12px 24px; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s;">
                ✓ Update Task
            </button>
            <a href="/tasks" style="background: #6c757d; color: white; padding: 12px 24px; border-radius: 5px; text-decoration: none; font-weight: 600; font-size: 14px;">
                ✕ Cancel
            </a>
        </div>
    </form>
</div>
@endsection