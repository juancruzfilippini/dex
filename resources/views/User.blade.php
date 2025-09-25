<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <div class="container py-4">

        <h1 class="mb-4">Buscar datos de usuario (CO_GED.DATOS_USUARIO)</h1>

        <form method="GET" action="{{ route('users.index') }}" class="row g-3 mb-4">
            <div class="col-sm-6 col-md-4">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario"
                    value="{{ old('usuario', $usuario ?? '') }}" placeholder="Ej: JFILIPPINI" autofocus>
            </div>
            <div class="col-auto align-self-end">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
            @if (($usuario ?? '') !== '')
                <div class="col-12">
                    <small class="text-muted">
                        Filtrando por: <strong>{{ $usuario }}</strong>
                    </small>
                </div>
            @endif
        </form>

        @if (isset($results) && $results->count())
            <div class="card">
                <div class="card-header">
                    Resultados ({{ $results->count() }})
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    @foreach ($cols as $c)
                                        <th>{{ $c }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $item)
                                    {{-- $item es ARRAY con claves en MAYÚSCULAS --}}
                                    <tr>
                                        @foreach ($cols as $c)
                                            <td>{{ $item[$c] ?? '' }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="p-3 text-muted">
                        <small>Consejo: si ocupa mucho ancho, buscá un usuario exacto (suele traer 1 fila).</small>
                    </div>
                </div>
            </div>
        @elseif(($usuario ?? '') !== '')
            <div class="alert alert-warning">
                No se encontraron resultados para <strong>{{ $usuario }}</strong>.
            </div>
        @endif

    </div>
</body>

</html>
