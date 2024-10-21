<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departamento;

class DepartamentoCrud extends Component
{
    //variable de control del modal
    public $isModalOpen = false;

    //variables para busque de registros
    public $search = '';

    //variables de la tabla
    protected $departamentos;
    public  $descripcion, $departamento_id;

        //metodo para abrir modal
    public function openModal()
    {
        $this->isModalOpen = true; // Aquí mantén esto para la lógica de Livewire.
        $this->dispatchBrowserEvent('open-modal');
    }

    //metodo para cerrar modal
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->dispatchBrowserEvent('close-modal');
    }

    //Metodo para eliminar informacion de los input
    private function resetInputFields()
    {
        $this->descripcion = '';
        $this->departamento_id = null;
    }

    // Método para cargar registros
    public function loadDepartamentos()
    {
        $this->departamentos = Departamento::paginate(4);
    }
    // Método para actualizar la paginación si es necesario
    public function updating()
    {
        $this->loadDepartamentos();
    }
    
    /*//////////////////////////////////////////////////*/

    public function render()
    {
        $this->departamentos = Departamento::paginate(4);
        
        return view('livewire.departamento.departamento-crud', [
            'isModalOpen' => $this->isModalOpen,
            'departamentos' => $this->departamentos,
        ]);
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
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
        $this->loadDepartamentos();
    }

    public function delete($id)
    {
        Departamento::find($id)->delete();
        session()->flash('message', 'Departamento eliminado correctamente.');
        $this->loadDepartamentos();
    }
}
