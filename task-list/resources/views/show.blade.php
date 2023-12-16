@extends('layouts.app')  {{-- use another template as reference --}}

{{-- fill in the empty section of the template --}}
@section('title')
 {{ $task->title }}   
@endsection

@section('content')
  @if ($task->description)
  <h2 class="bottom-12">Description</h2>
  <p>{{ $task->description }}</p>   
  @endif
  @if ($task->long_description)
    <h2 class="top-12 bottom-12">Long description</h2>
    <p>{{ $task->long_description }}</p>   
  @endif


  <div class="top-12 flex">
    <span>Created at: {{ $task->created_at }}</span>
    <span class="l-24">Updated at: {{ $task->updated_at }}</span>
  </div>

  <p class="top-12 bottom-12"> {{ $task->completed ? 'Not completed' : 'Completed'  }} </p>


  <div class="flex">
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
      @csrf @method('PUT')
      <button type="submit">Mark as {{ $task->completed ? 'completed' : 'not completed'  }}</button>
    </form>

    <a class="l-12" href="{{ route('tasks.edit', ['task' => $task ]) }}"><button>Edit</button></a>
    
    <form class="l-12" action="{{ route('tasks.destroy', ['task' => $task ]) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit">Delete</button>
    </form>
  </div>
    
  {{-- in laravel we have also a 'soft delete' to store deleted data temporarly --}}
@endsection