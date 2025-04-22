<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //permite usar factories si hacés tests (más adelante).
    use HasFactory;
    // Le decimos a Laravel que esta es la tabla 'tareas'
    protected $table = 'tareas';

    // Campos que se pueden cargar de forma masiva
    protected $fillable = ['titulo','descripcion'];

    //fillable, define qué campos podés llenar con métodos como create() o update().
}
