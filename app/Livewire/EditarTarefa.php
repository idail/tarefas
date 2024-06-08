<?php

namespace App\Livewire;

use App\Models\Categorias;
use App\Models\Tarefas;
use Exception;
use Livewire\Component;

class EditarTarefa extends Component
{
    public $nome_tarefa;
    public $nome_categoria;
    public $categoria_id;
    public $tarefa_id;

    protected $rules = [
        'nome_tarefa' => 'required',
        'nome_categoria' => 'required',
    ];

    protected $messages = [
        'nome_tarefa.required' => 'O campo nome é obrigatório.',
        'nome_categoria.required' => 'A categoria e obrigatoria.',
    ];

    public function mount($id)
    {
        try {
            $recebe_valor_tarefa = Tarefas::find($id);
            $recebe_valor_categoria = Categorias::find($id);

            $this->nome_tarefa = $recebe_valor_tarefa->nome;
            $this->nome_categoria = $recebe_valor_categoria->categoria;
            $this->categoria_id = $recebe_valor_tarefa->id_categoria;
            $this->tarefa_id = $recebe_valor_tarefa->id;
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function atualizar()
    {
        $this->validate();

        try {
            $recebe_categoria = Categorias::find($this->categoria_id);

            $recebe_categoria->categoria = $this->nome_categoria;
            $recebe_categoria->save();

            $recebe_tarefa = Tarefas::find($this->tarefa_id);
            $recebe_tarefa->nome = $this->nome_tarefa;
            $recebe_tarefa->save();

            session()->flash('success', 'Tarefa alterada com sucesso!');

            return $this->redirect("/", navigate: true);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function render()
    {
        return view('livewire.editar-tarefa');
    }
}
