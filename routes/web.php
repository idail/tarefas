<?php

use App\Livewire\Tarefas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/listagem_tarefas",Tarefas::class);