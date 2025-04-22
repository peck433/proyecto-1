<!-- resources/views/tareas/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 p-6">

    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">✏️ Editar Tarea</h1>

        <!-- Mensajes de error si hay validación -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición -->
        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="titulo" class="block font-semibold">Título:</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $tarea->titulo) }}" required
                       class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label for="descripcion" class="block font-semibold">Descripción:</label>
                <textarea name="descripcion" id="descripcion"
                          class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                          rows="4">{{ old('descripcion', $tarea->descripcion) }}</textarea>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('tareas.index') }}" class="text-blue-500 hover:underline">⬅️ Cancelar</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">💾 Guardar cambios</button>
            </div>
        </form>
    </div>

</body>
</html>

