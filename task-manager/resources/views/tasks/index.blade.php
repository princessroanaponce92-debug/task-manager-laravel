@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<div style="background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: #333; font-size: 28px;">Your Tasks</h2>
        <a href="/tasks/create" style="background: #28a745; color: white; padding: 12px 24px; border-radius: 5px; text-decoration: none; font-weight: 600; transition: all 0.3s;">+ Add New Task</a>
    </div>

    @if(count($tasks) > 0)
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                    <th style="padding: 15px; text-align: left;">Task Name</th>
                    <th style="padding: 15px; text-align: left;">Description</th>
                    <th style="padding: 15px; text-align: left;">Due Date</th>
                    <th style="padding: 15px; text-align: center;">Status</th>
                    <th style="padding: 15px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr style="border-bottom: 1px solid #eee; transition: all 0.3s;">
                        <td style="padding: 15px;"><strong>{{ $task->task_name }}</strong></td>
                        <td style="padding: 15px;">{{ $task->description ? substr($task->description, 0, 50) . '...' : '-' }}</td>
                        <td style="padding: 15px;">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : '-' }}
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <span style="padding: 6px 12px; border-radius: 15px; font-size: 12px; font-weight: 600; 
                                {{ $task->status === 'Completed' ? 'background: #d4edda; color: #155724;' : 'background: #fff3cd; color: #856404;' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <!-- STATUS BUTTON -->
                                <form action="/tasks/{{ $task->id }}/status" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="background: #0066cc; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; font-weight: 600;">
                                        {{ $task->status === 'Pending' ? '✓ Done' : '↺ Pending' }}
                                    </button>
                                </form>

                                <!-- EDIT BUTTON -->
                                <a href="/tasks/{{ $task->id }}/edit" style="background: #ffc107; color: #333; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; font-weight: 600;">✏️ Edit</a>

                                <!-- DELETE BUTTON -->
                                <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #dc3545; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; font-weight: 600;">🗑️ Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 60px 20px; color: #999;">
            <p style="font-size: 18px; margin-bottom: 20px;">📭 No tasks yet</p>
            <a href="/tasks/create" style="background: #667eea; color: white; padding: 12px 24px; border-radius: 5px; text-decoration: none; font-weight: 600;">Create Your First Task</a>
        </div>
    @endif
</div>
@endsection