<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Control del LED Remoto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- Bloque de Control del LED --}}
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white mb-4">Control del Laboratorio</h3>
                        <p class="text-gray-400 mb-6">Usa estos botones para controlar el estado del LED en la placa ESP32.</p>
                        <div class="flex space-x-4">
                            {{-- Botón para Encender --}}
                            <button onclick="toggleLed('on')" class="px-6 py-3 bg-green-500 text-white font-bold rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                                Encender LED
                            </button>

                            {{-- Botón para Apagar --}}
                            <button onclick="toggleLed('off')" class="px-6 py-3 bg-red-500 text-white font-bold rounded-lg shadow-md hover:bg-red-600 transition duration-300">
                                Apagar LED
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Script para la comunicación con la API --}}
    <script>
        function toggleLed(state) {
            // La URL correcta que apunta a tu API
            fetch('/api/led', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ state: state })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('La respuesta de la red no fue exitosa.');
                }
                return response.json();
            })
            .then(data => {
                console.log('Éxito:', data);
                alert('¡El estado del LED se cambió con éxito!');
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Falló al cambiar el estado del LED.');
            });
        }
    </script>
</x-app-layout>