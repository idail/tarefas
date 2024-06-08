{{-- @vite('resources/css/app.css') --}}
<title>Tarefas</title>
<div class="mx-auto w-1/2 bg-silver-500">

    <div class="w-full flex justify-end p-4">
        <a href="cadastrar_tarefa"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-800">Cadastrar
            Tarefa</a>
    </div>

    <form wire:submit.prevent="buscar">
        <div class="mb-4">
            <label for="task-name" class="block text-sm font-medium text-gray-700 mb-2">Pesquisar</label>
            <input type="text" wire:model="busca" id="busca" name="busca"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                placeholder="Informe o nome ou categoria que deseja">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-800 mt-2">
                Buscar
            </button>
            @error('busca')
                {{ $message }}
            @enderror
        </div>
    </form>
    <div class="overflow-x-auto">

        @if (session()->has('success'))
            <div class="bg-green-500 text-white px-4 py-2 bottom-0 right-0 mb-4 mr-4 rounded shadow text-center">
                {{ session('success') }}
            </div>
        @endif

        <h1 style="text-align: center;">Tarefas</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                        Nome
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                        Categoria
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        colspan="3">
                        Opções
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($dados as $categorias)
                    <tr>
                        @foreach ($categorias['tarefas'] as $tarefa)
                            
                            <td style="text-align: center;">{{ $tarefa->nome }}</td>
                            <td style="text-align: center;">{{ $categorias->categoria }}</td>
                            <td style="width: 5%;">
                                <a href="{{ route('tarefa.editar', $tarefa->id) }}" wire:navigate
                                    class="flex items-center bg-blue-500 text-white px-1 py-2 rounded hover:bg-blue-600 transition-colors"
                                    style="width: 40px;" title="Editar Tarefa">
                                    <svg class="w-7 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m1.768-1.768a2.5 2.5 0 00-3.536-3.536L3 18.999V21h2.001L18.999 7.001z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a class="flex items-center bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors"
                                    wire:click="exclusao({{ $tarefa->id }})" title="Excluir Tarefa">
                                    <svg class="w-7 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.136 21H7.865a2 2 0 01-1.997-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
                                    </svg>
                                </a>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
