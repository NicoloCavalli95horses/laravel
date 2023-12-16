@extends('layouts.app')

@section('title')
  Tasks list
@endsection

@section('content')
  <div class="add-task">
    <a href="{{ route('tasks.create') }}">Add task</a>
  </div>

    @forelse ($tasks as $task)
    <div class="todo-item">
      <a href="{{ route('tasks.show', [ 'task' => $task ]) }}"> <p>{{ $task->title }}</p> </a>
    </div>
    @empty
      <p>no tasks</p>      
    @endforelse

  @if ( $tasks->count() ) 
    <nav class="pagination"> {{  $tasks->links() }} </nav>
  @endif
@endsection