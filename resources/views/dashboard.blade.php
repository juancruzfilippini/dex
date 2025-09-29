<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('📊 Dashboard General') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- 🔹 Fila 1: Estadísticas rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="p-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl shadow-lg">
                    <h3 class="text-lg font-semibold">👥 Usuarios</h3>
                    <p class="text-3xl font-bold mt-2">125</p>
                    <p class="text-sm opacity-80">Registrados en el sistema</p>
                </div>

                <div class="p-6 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl shadow-lg">
                    <h3 class="text-lg font-semibold">📂 Expedientes</h3>
                    <p class="text-3xl font-bold mt-2">430</p>
                    <p class="text-sm opacity-80">Activos actualmente</p>
                </div>

                <div class="p-6 bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-xl shadow-lg">
                    <h3 class="text-lg font-semibold">📑 GEDOS</h3>
                    <p class="text-3xl font-bold mt-2">87</p>
                    <p class="text-sm opacity-80">Pendientes de revisión</p>
                </div>

                <div class="p-6 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-xl shadow-lg">
                    <h3 class="text-lg font-semibold">🔔 Notificaciones</h3>
                    <p class="text-3xl font-bold mt-2">12</p>
                    <p class="text-sm opacity-80">Enviadas hoy</p>
                </div>

            </div>

            <!-- 🔹 Fila 2: Accesos rápidos -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <a href="{{ route('users.index') }}" 
                   class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">👥 Usuarios</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Gestión de usuarios</p>
                </a>

                <a href="{{ route('expedientes.index') }}" 
                   class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">📂 Expedientes</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Consultas de expedientes</p>
                </a>

                <a href="{{ route('gedos.index') }}" 
                   class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">📑 GEDOS</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Consultas de GEDOS</p>
                </a>

                <a href="{{ route('profile.edit') }}" 
                   class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2">⚙️ Perfil</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Configuración personal</p>
                </a>

            </div>

            <!-- 🔹 Fila 3: Actividad reciente -->
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">📜 Últimas Actividades</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-2 text-gray-700 dark:text-gray-300">👤 Usuario <b>Juan Pérez</b> se registró en el sistema.</li>
                    <li class="py-2 text-gray-700 dark:text-gray-300">📂 Nuevo expediente creado con número <b>#12345</b>.</li>
                    <li class="py-2 text-gray-700 dark:text-gray-300">📑 GEDO cargado por <b>María López</b>.</li>
                    <li class="py-2 text-gray-700 dark:text-gray-300">🔔 Notificación enviada a todos los usuarios.</li>
                </ul>
            </div>

            <!-- 🔹 Fila 4: Placeholder para gráficos -->
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">📈 Estadísticas</h3>
                <div class="h-64 flex items-center justify-center text-gray-400 dark:text-gray-500 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg">
                    Gráfico (a futuro con Chart.js / ApexCharts)
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
