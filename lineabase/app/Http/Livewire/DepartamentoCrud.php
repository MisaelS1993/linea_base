<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departamento;

class DepartamentoCrud extends Component
{
    public $departamentos, $descripcion, $departamento_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->departamentos = Departamento::all();
        return view('livewire.departamento.departamento-crud',[
            'isModalOpen' => $this->isModalOpen,]);
        
    }



    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    

    public function openModal()
    {
        $this->isModalOpen = true; // Aquí mantén esto para la lógica de Livewire.
        $this->emit('openModal');
    }
    

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->emit('closeModal');
    }

    private function resetInputFields()
    {
        $this->descripcion = '';
        $this->departamento_id = null;
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        Departamento::updateOrCreate(['id' => $this->departamento_id], [
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('message', $this->departamento_id ? 'Departamento actualizado correctamente.' : 'Departamento creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        $this->departamento_id = $id;
        $this->descripcion = $departamento->descripcion;

        $this->openModal();
    }

    public function delete($id)
    {
        Departamento::find($id)->delete();
        session()->flash('message', 'Departamento eliminado correctamente.');
    }
}
