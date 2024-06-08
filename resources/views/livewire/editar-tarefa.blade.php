<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Alterar de Tarefa</h2>
        <form wire:submit.prevent="atualizar">
            <div class="mb-4">
                <label for="task-name" class="block text-sm font-medium text-gray-700 mb-2">Nome da Tarefa</label>
                <input type="text" wire:model="nome_tarefa" id="nome_tarefa" name="nome_tarefa"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" >
                @error('nome_tarefa')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-4">
                <label for="task-category" class="block text-sm font-medium text-gray-700 mb-2">Categoria da
                    Tarefa</label>
                <input type="text" wire:model="nome_categoria" id="nome_categoria" name="nome_categoria"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                @error('nome_categoria')
                    {{ $message }}
                @enderror
            </div>
            <div class="flex justify-end">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-800">
                    Salvar
                </button>

                <a href="/"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-800 ml-4">Voltar</a>
            </div>
        </form>
    </div>
</body>