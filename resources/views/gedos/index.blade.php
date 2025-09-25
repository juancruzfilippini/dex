<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('GEDOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold mb-6 text-gray-900 dark:text-gray-100">
                    Panel GEDOS 📑
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 1 -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Consulta rápida</h4>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            Aquí podrás realizar búsquedas simples dentro del sistema GEDOS.
                        </p>
                        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Ir a consulta
                        </button>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Estadísticas</h4>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            Visualiza métricas y reportes generales del sistema.
                        </p>
                        <button class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Ver estadísticas
                        </button>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Gestión avanzada</h4>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            Accede a funciones avanzadas para administración de expedientes GEDOS.
                        </p>
                        <button class="mt-4 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                            Administrar
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
