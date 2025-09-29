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
                    Panel de Consultas de GEDOS 📑
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    
                    <!-- Buscar por Número y Año -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Buscar por Número y Año</h4>
                        <form class="mt-4 space-y-3" method="POST" action="{{ route('gedos.numero') }}">
                            @csrf
                            <input type="text" name="numero" placeholder="Número" 
                                class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <input type="text" name="anio" placeholder="Año" 
                                class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Consultar por Repartición -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Por Repartición</h4>
                        <form class="mt-4 space-y-3" method="POST" action="{{ route('gedos.reparticion') }}">
                            @csrf
                            <input type="text" name="reparticion" placeholder="Código Repartición" 
                                class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Consultar bloqueados -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">GEDOS Bloqueados</h4>
                        <form class="mt-4 space-y-3" method="POST" action="{{ route('gedos.bloqueados') }}">
                            @csrf
                            <input type="text" name="usuario" placeholder="Usuario (opcional)" 
                                class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Consultar por Estado -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Por Estado</h4>
                        <form class="mt-4 space-y-3" method="POST" action="{{ route('gedos.estado') }}">
                            @csrf
                            <input type="text" name="estado" placeholder="Estado (ej: ACTIVO, ARCHIVADO)" 
                                class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
