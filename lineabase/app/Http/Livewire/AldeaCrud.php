<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Aldea;
use App\Models\Municipio;
use Illuminate\Http\Request;

class AldeaCrud extends Component
{
    public $aldeas, $municipios, $municipio_id, $descripcion, $aldea_id;
    public $isModalOpen = false; 

    public $searchTerm = ''; // Para la búsqueda por nombre de aldea o municipio

    // Método para renderizar las aldeas y municipios
    public function render()
    {
        // Búsqueda por nombre de aldea o municipio
        $this->aldeas = Aldea::with('municipio')
            ->where('descripcion', 'like', '%' . $this->searchTerm . '%') // Filtro por nombre de aldea
            ->orWhereHas('municipio', function ($query) {
                $query->where('descripcion', 'like', '%' . $this->searchTerm . '%'); // Filtro por nombre del municipio
            })
            ->get();

        $this->municipios = Municipio::all(); // Cargamos todos los municipios

        return view('livewire.aldea.aldea-crud', [
            'aldeas' => $this->aldeas,
            'municipios' => $this->municipios,
        ]);
    }

    // Crear una nueva aldea
    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    // Editar una aldea existente
    public function edit($id)
    {
        $aldea = Aldea::findOrFail($id);
        $this->aldea_id = $aldea->id;
        $this->descripcion = $aldea->descripcion;
        $this->municipio_id = $aldea->municipio_id;
        $this->openModal();
    }

    // Eliminar una aldea
    public function delete($id)
    {
        Aldea::find($id)->delete();
        session()->flash('message', 'Aldea eliminada exitosamente.');
    }

    // Abrir el modal
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    // Cerrar el modal
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // Reiniciar los campos del formulario
    public function resetFields()
    {
        $this->aldea_id = null;
        $this->descripcion = '';
        $this->municipio_id = '';
    }

    // Guardar o actualizar la aldea
    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
            'municipio_id' => 'required|exists:municipios,id',
        ]);

        Aldea::updateOrCreate(['id' => $this->aldea_id], [
            'descripcion' => $this->descripcion,
            'municipio_id' => $this->municipio_id,
        ]);

        session()->flash('message', $this->aldea_id ? 'Aldea actualizada exitosamente.' : 'Aldea creada exitosamente.');

        $this->closeModal();
        $this->resetFields();
    }
}
