<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task as ModelsTask;
use Illuminate\Http\Request; //handle post event
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Serve public static assest built by Vue.js 
// Route::get('/{any}', function () {
//   return file_get_contents(public_path('index.html'));
// })->where('any', '.*');

Route::get('/', function () {
  return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
  // get() will get everything, paginage(el-per-page) will separate the items into pages and will generate links for those pages
  $tasks = ModelsTask::latest()->paginate(10);
  return view('index', [ 'tasks' => $tasks ]);
})->name('tasks.index');


Route::view('/tasks/create', 'create')->name('tasks.create'); 


Route::get('tasks/{task}', function (ModelsTask $task) {
  return view('show', [ 'task' => $task ]);
})->name('tasks.show'); 


Route::get('tasks/{task}/edit', function (ModelsTask $task) {
  return view('edit', [ 'task' => $task ]);
})->name('tasks.edit'); 


Route::post('/tasks', function (TaskRequest $request) {
  $task = ModelsTask::create( $request -> validated() );
  return redirect()->route('tasks.show', ['task' => $task->id ])->with('success','task created successfully');
})->name('tasks.store');


Route::put('/tasks/{task}', function (ModelsTask $task, TaskRequest $request) {
  $task->update( $request->validated() );
  return redirect()->route('tasks.show', ['task' => $task->id ])->with('success','task updated successfully');
})->name('tasks.update');


Route::put('/tasks/{task}/toggle-complete', function (ModelsTask $task) {
  $task->toggleComplete();
  return redirect()->back()->with('success', 'task updated');
})->name('tasks.toggle-complete');


Route::delete('/tasks/{task}', function (ModelsTask $task) {
  $task->delete();
  return redirect()->route('tasks.index')->with('success', 'task deleted successfully');
})->name('tasks.destroy'); //common used name