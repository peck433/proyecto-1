<!-- resources/views/tareas/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear nueva tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white p-5 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Crear nueva tarea</h1>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 p-2 rounded text-red-700">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear una nueva tarea -->
        <form action="{{ route('tareas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="titulo" class="block font-semibold">Título:</label>
                <input type="text" name="titulo" id="titulo" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block font-semibold">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="w-full border px-3 py-2 rounded"></textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('tareas.index') }}" class="bg-gray-300 px-4 py-2 rounded">Cancelar</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>

</body>
</html>

