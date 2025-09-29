<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="rounded-2xl border border-indigo-200/70 dark:border-indigo-800/70 bg-indigo-50/90 dark:bg-indigo-950/70 px-5 py-4">
            <h2 class="font-bold text-2xl text-slate-900 dark:text-slate-100">Búsqueda de Usuario 🔎</h2>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                Consulta la fuente:
                <span class="font-mono text-xs bg-indigo-100 dark:bg-indigo-900 px-1 py-0.5 rounded text-indigo-700 dark:text-indigo-300">
                    CO_GED.DATOS_USUARIO
                </span>
            </p>
        </div>
    </x-slot>

    <div class="py-10" x-data="userSearch()">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- BUSCADOR --}}
            <section role="search"
                     class="rounded-2xl border-4 border-indigo-500/30 dark:border-indigo-700/50 bg-white/95 dark:bg-slate-900/90 shadow-xl p-6 backdrop-blur">
                <form method="GET" action="{{ route('users.index') }}" @submit="syncInput" class="space-y-3">
                    <label for="usuario" class="block text-base font-semibold text-slate-800 dark:text-slate-200">
                        Ingresa el Usuario
                    </label>

                    <div class="flex flex-col sm:flex-row gap-4 items-end">
                        <div class="relative flex-1 w-full">
                            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-5 w-5 text-indigo-500 dark:text-indigo-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 2a8 8 0 105.293 14.293l4.207 4.207a1 1 0 001.414-1.414l-4.207-4.207A8 8 0 0010 2zm-6 8a6 6 0 1110.392 4.392A6 6 0 014 10z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input
                                id="usuario"
                                name="usuario"
                                type="text"
                                x-model="query"
                                value="{{ old('usuario', $usuario ?? '') }}"
                                placeholder=""
                                class="block w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 pl-10 pr-4 py-3 text-base text-slate-900 dark:text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-4 focus:ring-indigo-200 focus:border-indigo-600 dark:focus:ring-indigo-900"
                                autocomplete="off"
                                autofocus
                            />
                        </div>

                        <div class="flex gap-3 w-full sm:w-auto">
                            <button
                                type="button"
                                x-show="query.length"
                                @click="clear()"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Limpiar
                            </button>

                            <button
                                type="submit"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-md hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Buscar
                            </button>
                        </div>
                    </div>

                    @if(($usuario ?? '') !== '')
                        <p class="text-sm text-slate-600 dark:text-slate-400">
                            Filtro actual:
                            <span class="font-semibold text-indigo-600 dark:text-indigo-400">{{ $usuario }}</span>
                        </p>
                    @endif
                </form>
            </section>

            {{-- RESULTADOS --}}
            @if (isset($results) && $results->count())
                <section class="mt-8">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <h3 class="text-xl font-bold text-slate-800 dark:text-slate-200">
                            Resultados encontrados
                            <span class="ml-2 inline-flex items-center rounded-full bg-indigo-100 dark:bg-indigo-900 px-3 py-1 text-sm font-bold text-indigo-700 dark:text-indigo-300">
                                {{ $results->count() }}
                            </span>
                        </h3>

                        <a href="{{ route('users.index') }}"
                           class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-300 dark:hover:text-indigo-200 p-1 rounded-md hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                            Reiniciar búsqueda completa
                        </a>
                    </div>

                    <ul class="mt-6 space-y-4">
                        @foreach ($results as $item)
                            @php
                                $nombre = $item['APELLIDO_NOMBRE'] ?? 'Nombre no disponible';
                                $usuarioVal = $item['USUARIO'] ?? null;
                                $sup = $item['USER_SUPERIOR'] ?? '—';
                                $mail = $item['MAIL'] ?? null;
                                $cuit = $item['NUMERO_CUIT'] ?? null;
                            @endphp

                            {{-- Tarjeta horizontal: ícono a la izquierda, datos a la derecha --}}
                            <li class="rounded-2xl border border-slate-200 dark:border-slate-800 bg-white/95 dark:bg-slate-900/90 shadow-lg hover:shadow-xl hover:ring-2 hover:ring-indigo-500/50 transition-all duration-300">
                                <article class="p-5 sm:p-6">
                                    <div class="flex items-start gap-5">
                                        {{-- Icono / Avatar --}}
                                        <div class="flex-shrink-0 h-14 w-14 rounded-full bg-indigo-500/10 dark:bg-indigo-900/40 flex items-center justify-center ring-2 ring-inset ring-indigo-500/30 dark:ring-indigo-700">
                                            <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4.418 0-8 2.239-8 5v1a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-1c0-2.761-3.582-5-8-5Z"/>
                                            </svg>
                                        </div>

                                        {{-- Datos --}}
                                        <div class="min-w-0 flex-1">
                                            <header class="flex items-center gap-3 flex-wrap mb-2">
                                                <h4 class="truncate text-xl font-bold text-slate-900 dark:text-slate-100">
                                                    {{ $nombre }}
                                                </h4>
                                                @if ($usuarioVal)
                                                    <span class="inline-flex items-center rounded-full bg-slate-200 dark:bg-slate-700 px-2.5 py-0.5 text-xs font-semibold text-slate-700 dark:text-slate-300 border border-slate-300 dark:border-slate-600">
                                                        {{ $usuarioVal }}
                                                    </span>
                                                @endif
                                            </header>

                                            <dl class="grid gap-4 sm:grid-cols-2 text-sm">
                                                <div>
                                                    <dt class="text-slate-500 dark:text-slate-400 font-medium">Superior</dt>
                                                    <dd class="text-slate-900 dark:text-slate-100 mt-0.5 truncate">{{ $sup }}</dd>
                                                </div>

                                                <div>
                                                    <dt class="text-slate-500 dark:text-slate-400 font-medium">CUIT</dt>
                                                    <dd class="flex items-center gap-2 mt-0.5">
                                                        <span class="text-slate-900 dark:text-slate-100 font-semibold">{{ $cuit ?? '—' }}</span>
                                                        @if ($cuit)
                                                            <button type="button"
                                                                    @click="copy('{{ $cuit }}','CUIT copiado')"
                                                                    class="inline-flex items-center rounded-md border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-2 py-0.5 text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                                                                Copiar
                                                            </button>
                                                        @endif
                                                    </dd>
                                                </div>

                                                <div class="sm:col-span-2">
                                                    <dt class="text-slate-500 dark:text-slate-400 font-medium">Email</dt>
                                                    <dd class="flex items-center gap-2 mt-0.5 flex-wrap">
                                                        @if ($mail)
                                                            <a href="mailto:{{ $mail }}" class="font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300 underline truncate">
                                                                {{ $mail }}
                                                            </a>
                                                            <button type="button"
                                                                    @click="copy('{{ $mail }}','Mail copiado')"
                                                                    class="inline-flex items-center rounded-md border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-2 py-0.5 text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                                                                Copiar
                                                            </button>
                                                        @else
                                                            <span class="text-slate-900 dark:text-slate-100">—</span>
                                                        @endif
                                                    </dd>
                                                </div>
                                            </dl>

                                            @if ($mail)
                                                <footer class="mt-4 pt-3 border-t border-slate-200 dark:border-slate-700">
                                                    <a href="mailto:{{ $mail }}"
                                                       class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-md hover:bg-indigo-700 transition">
                                                        <svg class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                            <polyline points="22,6 12,13 2,6"></polyline>
                                                        </svg>
                                                        Enviar correo
                                                    </a>
                                                </footer>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </section>

            {{-- VACÍO --}}
            @elseif(($usuario ?? '') !== '')
                <section class="mt-8 rounded-xl border border-amber-400/70 dark:border-amber-700/50 bg-amber-50 dark:bg-slate-800/50 p-6 text-center shadow-lg">
                    <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-amber-200/50 dark:bg-amber-800/30 text-amber-600 dark:text-amber-300 mb-4">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2Zm0 13a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0-1-1Zm0-9a1 1 0 0 0-1 1v6a1 1 0 0 0 2 0V7a1 1 0 0 0-1-1Z"/>
                        </svg>
                    </div>
                    <p class="font-bold text-lg text-amber-900 dark:text-amber-100">¡Sin resultados!</p>
                    <p class="text-base mt-1 text-amber-800 dark:text-amber-300">
                        No encontramos datos para el usuario
                        <span class="font-bold text-indigo-600 dark:text-indigo-400">"{{ $usuario }}"</span>.
                    </p>
                    <p class="text-sm mt-1 text-amber-700 dark:text-amber-400">
                        Revisá mayúsculas/minúsculas o probá con otra sigla.
                    </p>
                    <a href="{{ route('users.index') }}"
                       class="mt-4 inline-flex items-center rounded-xl border border-amber-300 dark:border-amber-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-amber-700 dark:text-amber-200 hover:bg-amber-100 dark:hover:bg-slate-700 transition">
                        Comenzar nueva búsqueda
                    </a>
                </section>
            @endif
        </div>
    </div>

    {{-- Alpine helpers --}}
    <script>
        function userSearch() {
            return {
                query: @json(old('usuario', $usuario ?? '')),
                clear() {
                    this.query = '';
                    const el = document.getElementById('usuario'); el?.focus();
                },
                syncInput() {
                    const el = document.getElementById('usuario');
                    if (el) el.value = this.query;
                },
                copy(text, msg = 'Copiado') {
                    navigator.clipboard.writeText(text).then(() => {
                        const t = document.createElement('div');
                        t.textContent = msg;
                        t.setAttribute('role','status');
                        t.className = 'fixed bottom-5 left-1/2 -translate-x-1/2 z-50 rounded-lg bg-indigo-600 text-white text-sm px-3 py-1.5 shadow-xl transition-opacity duration-300';
                        document.body.appendChild(t);
                        setTimeout(() => t.remove(), 1500);
                    });
                }
            }
        }
    </script>
</x-app-layout>
