<?php

namespace App\Http\Controllers;
//se usa para importar el modelo Tarea dentro del controlador TareaController.php
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    // ✅ Mostrar todas las tareas
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    // ✅ Mostrar el formulario para crear una tarea nueva
    public function create()
    {
        return view('tareas.create');
    }

    // ✅ Guardar una tarea nueva en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente');
    }

    // ✅ Mostrar el formulario para editar una tarea existente
    public function edit($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
        }

        return view('tareas.edit', compact('tarea'));
    }

    // ✅ Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
        }

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente');
    }

    // ✅ Eliminar una tarea
    public function destroy($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
        }

        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente');
    }

    // 🔍 Buscar una tarea por su ID
    public function show($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
        }

        return view('tareas.show', compact('tarea'));
    }
}
