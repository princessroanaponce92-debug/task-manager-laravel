@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="card">
    <h2>Create New Task</h2>

    <form action="/tasks" method="POST" style="margin-top: 20px;">
        @csrf

        <div class="form-group">
            <label>Task Name *</label>
            <input type="text" name="task_name" value="{{ old('task_name') }}" required>
            @error('task_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Due Date</label>
            <input type="date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Create Task</button>
            <a href="/tasks" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection