<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortariaController;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/salvar-portaria', [PortariaController::class, 'salvar'])->middleware('auth');
Route::get('/dados-cadastrados', [PortariaController::class, 'mostrarDadosCadastrados'])->name('dados-cadastrados')->middleware('auth');
Route::post('/salvarVisita', [PortariaController::class, 'salvarVisita'])->middleware('auth');
Route::get('/registrarVisita/{id}', [PortariaController::class, 'RegistrarVisita'])->name('RegistrarVisita')->middleware('auth');
Route::get('/visitas-abertas', [PortariaController::class, 'visitasAbertas'])->name('visitas.abertas');
Route::post('/encerrar-visita/{id}', [PortariaController::class, 'encerrarVisita'])->name('encerrarVisita');
