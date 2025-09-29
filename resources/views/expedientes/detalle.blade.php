<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle del Expediente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(empty($detalle) || count($detalle) === 0)
                    <div class="text-center text-gray-600 dark:text-gray-300">
                        ❌ No se encontró información para este expediente.
                    </div>
                @else
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                            Información General 📑
                        </h3>

                        <!-- Mostrar campos en una tabla simple -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($detalle[0] as $campo => $valor)
                                    <tr>
                                        <td class="px-6 py-3 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
                                            {{ $campo }}
                                        </td>
                                        <td class="px-6 py-3 text-sm text-gray-900 dark:text-gray-200">
                                            {{ $valor ?? '—' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <!-- Botón volver -->
                <div class="mt-6 text-center">
                    <a href="{{ route('expedientes.index') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        ⬅ Volver al Panel de Consultas
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
