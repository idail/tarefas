<?php

use App\Livewire\CriarTarefa;
use App\Livewire\EditarTarefa;
use App\Livewire\Tarefas;
use Illuminate\Support\Facades\Route;

Route::get("/",Tarefas::class);
Route::get("/cadastrar_tarefa",CriarTarefa::class);
Route::get("/edicao/tarefa/{id}",EditarTarefa::class)->name("tarefa.editar");