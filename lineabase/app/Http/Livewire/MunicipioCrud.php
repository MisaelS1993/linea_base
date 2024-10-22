<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithPagination;

class MunicipioCrud extends Component
{
    // Variable para el Modal
    public $isModalOpen = false;

    //variables para busque de registros
    public $search = '';

    use WithPagination; // Importar el trait para paginación

    //Variables de tablas
    protected $municipios;
    public $departamentos, $departamento_id, $descripcion, $municipio_id;

    //abre Modal
    public function openModal()
    {
        $this->isModalOpen = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    //cerrar Modal
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->dispatchBrowserEvent('close-modal');
    }

    // Borrar Datos Controles
    public function resetFields()
    {
        $this->municipio_id = null;
        $this->descripcion = '';
        $this->departamento_id = '';
    }

    // Método para cargar registros
    public function loadDepartamentos()
    {
        $this->municipios = Municipio::when($this->search, function ($query) {
            $query->where('descripcion', 'like', '%' . $this->search . '%');
        })->paginate(3);

        // Cargamos todos los departamentos
        $this->departamentos = Departamento::all(); 
    }

    // Método para actualizar la paginación si es necesario
    public function updating()
    {
        $this->loadDepartamentos();
    }

    /*//////////////////////////////////////////////////*/

    // Método para renderizar los municipios y departamentos
    public function render()
    {
        $this->loadDepartamentos();

        return view('livewire.municipio.municipio-crud', [
            'municipios' => $this->municipios,
            'departamentos' => $this->departamentos,
        ]);
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $municipio = Municipio::findOrFail($id);
        $this->municipio_id = $municipio->id;
        $this->descripcion = $municipio->descripcion;
        $this->departamento_id = $municipio->departamento_id;
        $this->openModal();
        $this->loadDepartamentos();
    }

    public function delete($id)
    {
        Municipio::find($id)->delete();
        session()->flash('message', 'Municipio eliminado exitosamente.');
        $this->loadDepartamentos();
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        Municipio::updateOrCreate(['id' => $this->municipio_id], [
            'descripcion' => $this->descripcion,
            'departamento_id' => $this->departamento_id,
        ]);

        session()->flash('message', $this->municipio_id ? 'Municipio actualizado exitosamente.' : 'Municipio creado exitosamente.');

        $this->closeModal();
        $this->resetFields();
    }
}
