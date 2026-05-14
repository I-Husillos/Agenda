<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Citas</title>
</head>
<body>

<h1>Listado de Citas</h1>

<table border="1">
    <thead>
        <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Descripción</th>
            <th>Contacto(s)</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($citas as $cita)
            <tr>
                <td>{{ $cita->titulo }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->descripcion }}</td>
                <td>
                    @foreach ($cita->contactos as $contacto)
                        {{ $contacto->nombre }} {{ $contacto->apellidos }}<br>
                    @endforeach
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay citas registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>