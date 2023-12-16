@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task' )

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task ]) : route('tasks.store') }}">
    @csrf 
    @isset($task)
        @method('PUT')
    @endisset
    
      <div class="input-box">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
        @error('title')
        <p class="error-msg">{{ $message }}</p>
        @enderror
      </div>
        
      <div class="input-box">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5">
            {{ $task->description ?? old('description') }}
        </textarea>
        @error('description')
        <p class="error-msg">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="input-box">
        <label for="long_description">Long description</label>
        <textarea name="long_description" id="long_description" rows="10">
            {{ $task->long_description ?? old('long_description') }}
        </textarea>
        @error('long_description')
          <p class="error-msg">{{ $message }}</p>
        @enderror
      </div>

      <button class="l-12" type="submit">
        @isset($task)
          Update task
        @else
          Add new task
        @endisset
      </button>
    </form>
@endsection

@section('style')
  <style>
    .error-msg {
      color: red;
      font-size: 10px;
    }
    .input-box {
      display: flex;
      flex-direction: column;
      margin: 12px;
      width: 300px;
    }
  </style>
@endsection