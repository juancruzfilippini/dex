<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resultados de Expedientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (empty($resultados))
                    <div class="text-center text-gray-600 dark:text-gray-300">
                        🚫 No se encontraron resultados para la búsqueda.
                    </div>
                @else
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                @foreach (array_keys((array) $resultados[0]) as $columna)
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                        {{ $columna }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($resultados as $fila)
                                <tr>
                                    @foreach ((array) $fila as $valor)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                            {{ $valor }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- 📌 Paginación -->
                    <div class="mt-6 flex justify-between items-center">
                        @php
                            $pagina = request()->get('page', 1);
                            $prev = $pagina > 1 ? $pagina - 1 : null;
                            $next = count($resultados) == $perPage ? $pagina + 1 : null;
                        @endphp

                        <div>
                            @if ($prev)
                                <a href="{{ request()->fullUrlWithQuery(['page' => $prev]) }}"
                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                    ⬅️ Anterior
                                </a>
                            @endif
                        </div>

                        <div>
                            Página <span class="font-bold">{{ $pagina }}</span>
                        </div>

                        <div>
                            @if ($next)
                                <a href="{{ request()->fullUrlWithQuery(['page' => $next]) }}"
                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                    Siguiente ➡️
                                </a>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Botón Volver -->
                <div class="mt-6 text-center">
                    <a href="{{ route('expedientes.index') }}"
                        class="inline-block px-6 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700">
                        ⬅️ Volver al Panel de Consultas
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
