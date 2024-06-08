<?php

namespace App\Livewire;

use App\Models\Categorias;
use App\Models\Tarefas;
use Exception;
use Livewire\Component;

class CriarTarefa extends Component
{
    public $nome_tarefa;
    public $nome_categoria;
    public $categoria;

    protected $rules = [
        'nome_tarefa' => 'required',
        'nome_categoria' => 'required',
    ];

    protected $messages = [
        'nome_tarefa.required' => 'O campo nome é obrigatório.',
        'nome_categoria.required' => 'A categoria e obrigatoria.',
    ];
    
    public function cadastrar()
    {

        $this->validate();

        try {
            $valor = Categorias::create([
                "categoria" => $this->nome_categoria
            ]);

            Tarefas::create([
                "nome" => $this->nome_tarefa,
                "id_categoria" => $valor->id,
            ]);

            session()->flash('success', 'Tarefa cadastrada com sucesso!');

            return $this->redirect("/", navigate: true);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
?>