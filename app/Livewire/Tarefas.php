<?php

namespace App\Livewire;

use App\Models\Categorias;
use Exception;
use Livewire\Component;

class Tarefas extends Component
{
    public $dados;
    public $busca;

    public function render()
    {
        $this->dados =  Categorias::with('tarefas')->get();
        return view('livewire.tarefas');
    }

    public function exclusao($id)
    {
        try {
            $recebe_valor = Categorias::find($id);

            if ($recebe_valor)
                $recebe_valor->delete();

            session()->flash('success', 'Tarefa excluída com sucesso!');

            return $this->redirect("/", navigate: true);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function buscar()
    {
        $filtro = '%' . $this->busca . '%';

        $this->dados = Tarefas::query()
            ->where('nome', 'like', $filtro)->get();

        return view('livewire.tarefas');

        dd($this->busca);
    }
}
?>