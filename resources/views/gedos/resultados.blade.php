<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resultados de GEDOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(empty($resultados) || count($resultados) === 0)
                    <div class="text-center text-gray-600 dark:text-gray-300">
                        ❌ No se encontraron resultados.
                    </div>
                @else
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                @foreach(array_keys((array) $resultados[0]) as $columna)
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ $columna }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($resultados as $fila)
                                <tr>
                                    @foreach((array) $fila as $valor)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $valor }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <!-- Botón volver -->
                <div class="mt-6">
                    <a href="{{ route('gedos.index') }}" 
                       class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        ⬅ Volver al Panel de Consultas
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
