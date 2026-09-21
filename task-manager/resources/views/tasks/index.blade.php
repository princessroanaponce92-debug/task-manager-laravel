@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Your Tasks</h2>
        <a href="/tasks/create" class="btn btn-primary">+ Add New Task</a>
    </div>

    @if($tasks->count() > 0)
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f5f5f5;">
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Task Name</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Description</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Due Date</th>
                    <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd;">Status</th>
                    <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">
                            <strong>{{ $task->task_name }}</strong>
                        </td>
                        <td style="padding: 12px;">
                            {{ $task->description ? substr($task->description, 0, 50) . '...' : 'No description' }}
                        </td>
                        <td style="padding: 12px;">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No date' }}
                        </td>
                        <td style="padding: 12px; text-align: center;">
                            <span style="padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: 600;
                                {{ $task->status === 'Completed' ? 'background: #d4edda; color: #155724;' : 'background: #fff3cd; color: #856404;' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td style="padding: 12px; text-align: center;">
                            <div class="btn-group" style="justify-content: center;">
                                <form action="/tasks/{{ $task->id }}/status" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="padding: 5px 10px; font-size: 12px;">
                                        {{ $task->status === 'Pending' ? '✓ Complete' : '↺ Pending' }}
                                    </button>
                                </form>
                                <a href="/tasks/{{ $task->id }}/edit" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                                <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #999; padding: 40px 0;">
            No tasks yet. <a href="/tasks/create" style="color: #667eea;">Create one now!</a>
        </p>
    @endif
</div>
@endsection