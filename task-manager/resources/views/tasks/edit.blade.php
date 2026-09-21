@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="card">
    <h2>Edit Task</h2>

    <form action="/tasks/{{ $task->id }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Task Name *</label>
            <input type="text" name="task_name" value="{{ $task->task_name }}" required>
            @error('task_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ $task->description }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Due Date</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}">
            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="/tasks" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection