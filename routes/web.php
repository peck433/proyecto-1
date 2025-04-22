<?php

/*use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});*/

/*use App\Http\Controllers\TareaController;*/

/*Route::get('/', function () {
    return redirect()->route('tareas.index');
    //Le estamos diciendo: "Si alguien entra a la página principal /, redirigilo a /tareas"
});

Route::resource('tareas', TareaController::class);
//Eso crea automáticamente todas las rutas necesarias para el CRUD*/
/*---------------------------------------------------------------------------------------*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

// Ruta para la página de bienvenida al ir a localhost/
Route::get('/', function () {
    return view('welcome');
});

// Rutas para tareas (CRUD completo)
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');       // Mostrar listado
Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create'); // Formulario para crear
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');        // Guardar nueva tarea
Route::get('/tareas/{id}', [TareaController::class, 'show'])->name('tareas.show');       // Ver tarea individual
Route::get('/tareas/{id}/edit', [TareaController::class, 'edit'])->name('tareas.edit');  // Formulario para editar
Route::put('/tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');   // Guardar cambios
Route::delete('/tareas/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy'); // Eliminar tarea

