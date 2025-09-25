<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expedientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold mb-6 text-gray-900 dark:text-gray-100">
                    Panel de Consultas de Expedientes 📂
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Buscar por Número y Año -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Buscar por Número y Año</h4>
                        <form method="POST" action="{{ route('expedientes.numero') }}" class="mt-4 space-y-3">
                            @csrf
                            <input type="text" name="numero" placeholder="Número" class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <input type="text" name="anio" placeholder="Año" class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Expedientes por Repartición -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Por Repartición</h4>
                        <form method="POST" action="{{ route('expedientes.reparticion') }}" class="mt-4 space-y-3">
                            @csrf
                            <input type="text" name="reparticion" placeholder="Código Repartición" class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Expedientes con Documentos asociados -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Con Documentos Asociados</h4>
                        <form method="POST" action="{{ route('expedientes.documentos') }}" class="mt-4 space-y-3">
                            @csrf
                            <input type="text" name="expediente_id" placeholder="ID Expediente" class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Expedientes Bloqueados -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Expedientes Bloqueados</h4>
                        <form method="POST" action="{{ route('expedientes.bloqueados') }}" class="mt-4 space-y-3">
                            @csrf
                            <input type="text" name="usuario" placeholder="Usuario / Área (opcional)" class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                    <!-- Expedientes por Solicitante -->
                    <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Por Solicitante</h4>
                        <form method="POST" action="{{ route('expedientes.solicitante') }}" class="mt-4 space-y-3">
                            @csrf
                            <input type="text" name="cuil" placeholder="CUIL / CUIT" class="w-full p-2 rounded border dark:bg-gray-800 dark:text-gray-200">
                            <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                Consultar
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
