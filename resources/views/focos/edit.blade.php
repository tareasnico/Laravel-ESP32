<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Editar Foco') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{-- La acción apunta a 'update' y pasa el objeto $foco --}}
                <form action="{{ route('focos.update', $foco) }}" method="POST">
                    @csrf
                    {{-- Es necesario especificar que es un método PUT para actualizar --}}
                    @method('PUT')
                    {{-- Incluimos el formulario parcial --}}
                    @include('focos._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>