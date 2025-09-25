<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expedientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">
                    Listado de expedientes
                </h3>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200">Título</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($expedientes as $expediente)
                            <tr>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $expediente->id }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $expediente->titulo }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $expediente->estado }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $expediente->fecha }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($expedientes->isEmpty())
                    <p class="mt-4 text-gray-500 dark:text-gray-400">No se encontraron expedientes.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
