<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8 font-sans">

    <h1 class="text-3xl font-bold mb-6 text-blue-600">📝 Listado de Tareas</h1>

    @if (session('success'))
        <p class="text-green-600 font-semibold">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="text-red-600 font-semibold">{{ session('error') }}</p>
    @endif
    <br><br>
    <!-- Botón para crear nueva tarea -->
    <div class="mb-4">
        <a href="{{ route('tareas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            ➕ Crear nueva tarea
        </a>
    </div>

    <!-- 🔍 Buscar tarea por ID -->
    <form onsubmit="event.preventDefault(); buscarTarea();" class="mb-6 flex items-center gap-2">
        <label for="buscar_id" class="font-medium">Buscar por ID:</label>
        <input type="number" id="buscar_id" placeholder="ID de la tarea" class="border p-2 rounded w-32">
        <button type="submit" class="bg-gray-700 text-white px-3 py-2 rounded hover:bg-gray-900">
            Buscar
        </button>
    </form>

    <script>
        function buscarTarea() {
            const id = document.getElementById('buscar_id').value;
            if (id) {
                window.location.href = `/tareas/${id}`;
            } else {
                alert('Ingresá un ID válido');
            }
        }
    </script>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Título</th>
                    <th class="py-2 px-4 border">Descripción</th>
                    <th class="py-2 px-4 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tareas as $tarea)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border">{{ $tarea->id }}</td>
                        <td class="py-2 px-4 border">{{ $tarea->titulo }}</td>
                        <td class="py-2 px-4 border">{{ $tarea->descripcion }}</td>
                        <td class="py-2 px-4 border">
                            <div class="flex justify-between items-center gap-4">
                                <a href="{{ route('tareas.edit', $tarea->id) }}" class="text-yellow-600 hover:underline">Editar</a>

                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')" class="text-red-600 hover:underline">
                                        Eliminar
                                    </button>
                                </form>

                                <a href="{{ route('tareas.show', $tarea->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No hay tareas cargadas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
