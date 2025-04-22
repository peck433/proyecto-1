<!-- resources/views/tareas/show.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 p-6">

    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">📋 Detalle de la Tarea</h1>

        <div class="mb-4">
            <strong>ID:</strong> {{ $tarea->id }}
        </div>

        <div class="mb-4">
            <strong>Título:</strong> {{ $tarea->titulo }}
        </div>

        <div class="mb-4">
            <strong>Descripción:</strong> {{ $tarea->descripcion }}
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('tareas.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">🔙 Volver</a>
            <a href="{{ route('tareas.edit', $tarea->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">✏️ Editar</a>
        </div>
    </div>

</body>
</html>
