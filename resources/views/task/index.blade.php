<x-layout>
    <div class="container">
        <div class="todo-app">
        <h1>Task Manager</h1>
            <form class="row" action="/tasks" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Enter task title" required>
                <button type="submit" class="addBtn">Add Task</button>
            </form>
            <ul id="list-container">

                @foreach ($tasks as $task)
                

                    @if($task->completed == 1)
                    <li class="checked">
                    @else
                    <li>
                    @endif
                    {{ $task->title }}
                    <a href="{{ route('task.completed', $task->id) }}" onclick="return confirm('Task completed!')">
                    <i class="fa fa-check"></i>
                    </a>
                    
                    <span>
                    <a href="{{ route('task.delete', $task->id)}}" onclick="return confirm('Are you sure wat to delete this task')">
                        <i class="fa fa-trash"></i>
                    </a>
                              
                    </span>
                    
                </li>
                
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif