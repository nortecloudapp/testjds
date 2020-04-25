<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'EscritorioController@index');
    // Rutas Escritorio
    Route::get('escritorio', 'EscritorioController@index')->name('escritorio.index');
    Route::resource('ciclo', 'CicloController');
    Route::resource('curso', 'CursoController');
    Route::resource('ncurso', 'NcursoController');
    Route::resource('programa', 'ProgramaController');
    Route::resource('nota', 'NotaController');
    Route::resource('material', 'MaterialController');
    Route::resource('administrador', 'AdministradorController');
    Route::get('docentes', 'AdministradorController@docentes')->name('usuario.docentes');
    Route::get('alumnos', 'AdministradorController@alumnos')->name('usuario.alumnos');
    // Rutas PDF
    Route::get('pdf_usuarios', 'AdministradorController@pdfusuarios')->name('pdf.usuarios');
    // Rutas Permisos
    Route::get('dar_permiso/{id}', 'AdministradorController@giveAdmin')->name('give.Admin');
    Route::get('remover_permiso/{id}', 'AdministradorController@removeAdmin')->name('remove.Admin');
});
