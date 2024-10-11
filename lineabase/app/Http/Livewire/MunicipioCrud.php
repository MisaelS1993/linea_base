<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;

class MunicipioCrud extends Component
{
    public $municipios, $departamentos, $departamento_id, $descripcion, $municipio_id;
    public $isModalOpen = false;

    public $searchTerm = ''; // Para la búsqueda por nombre de municipio


    // Método para renderizar los municipios y departamentos
    public function render()
    {
        $this->municipios = Municipio::with('departamento')
            ->where('descripcion', 'like', '%' . $this->searchTerm . '%') // Filtro por nombre del municipio
            ->orWhereHas('departamento', function ($query) {
                $query->where('descripcion', 'like', '%' . $this->searchTerm . '%'); // Filtro por nombre del departamento
            })
            ->get();

        $this->departamentos = Departamento::all(); // Cargamos todos los departamentos

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
    }

    public function delete($id)
    {
        Municipio::find($id)->delete();
        session()->flash('message', 'Municipio eliminado exitosamente.');
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        $this->municipio_id = null;
        $this->descripcion = '';
        $this->departamento_id = '';
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
