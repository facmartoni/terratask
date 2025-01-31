<?php

  use App\Livewire\Map;
  use App\Livewire\Profile;
  use App\Livewire\Search;
  use App\Livewire\TasksCreate;
  use App\Livewire\TasksIndex;
  use App\Livewire\TasksShow;
  use App\Livewire\UserDetail;
  use Illuminate\Support\Facades\Route;

  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
  ])->group(function () {
    Route::get('/', TasksIndex::class);
    Route::get('/search', Search::class);
    Route::get('/tasks-create', TasksCreate::class);
    Route::get('/tasks/{task}', TasksShow::class);
    Route::get('/users/{user}', UserDetail::class);
    Route::get('/map', Map::class);
    Route::get('/profile', Profile::class);
  });
