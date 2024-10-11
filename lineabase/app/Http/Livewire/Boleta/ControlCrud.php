<?php

namespace App\Http\Livewire\Boleta;

use Livewire\Component;
use App\Models\Control;
// Asegúrate de importar el modelo Control

class ControlCrud extends Component
{
    public $controls, $control_id, $fecha_hora, $entrevistador, $supervisor, $id_departamento, $id_municipio, $id_aldea, $observacion, $telefono, $no_manzana, $no_lote, $ubicacion_vivienda, $no_catastral, $entrevistado;
    public $isModalOpen = false;


    public function render()
    {
        // Obtener todos los registros de control con relaciones de aldea, municipio y departamento
        $this->controls = Control::with('Aldea', 'Municipio', 'Departamento')->get();

        return view('livewire.boleta.control-crud', [
            'controls' => $this->controls,
        ]);
    }

    // Crear una nueva Boleta
    public function create()
    {
        $this->resetForm();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'fecha_hora' => 'required|date',
            'entrevistador' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'entrevistado' => 'required|string|max:255',
            'id_departamento' => 'required|integer',
            'id_municipio' => 'required|integer',
            'id_aldea' => 'required|integer',
            'observacion' => 'nullable|string',
            'telefono' => 'nullable|string|max:15',
            'no_manzana' => 'nullable|string|max:10',
            'no_lote' => 'nullable|string|max:10',
            'ubicacion_vivienda' => 'nullable|string|max:255',
            'no_catastral' => 'nullable|string|max:20',
        ]);

        Control::updateOrCreate(['id' => $this->control_id], [
            'fecha_hora' => $this->fecha_hora,
            'entrevistador' => $this->entrevistador,
            'supervisor' => $this->supervisor,
            'entrevistado' => $this->entrevistado,
            'id_departamento' => $this->id_departamento,
            'id_municipio' => $this->id_municipio,
            'id_aldea' => $this->id_comunidad,
            'observacion' => $this->observacion,
            'telefono' => $this->telefono,
            'no_manzana' => $this->no_manzana,
            'no_lote' => $this->no_lote,
            'ubicacion_vivienda' => $this->ubicacion_vivienda,
            'no_catastral' => $this->no_catastral,
        ]);

        session()->flash('message', $this->control_id ? 'Control actualizado.' : 'Control creado.');

        $this->resetForm(); // Llama al nuevo método
        $this->closeModal();
        $this->controls = Control::all();

    }

    public function edit($id)
    {
        $control = Control::findOrFail($id);
        $this->control_id = $id;
        $this->fecha_hora = $control->fecha_hora;
        $this->entrevistador = $control->entrevistador;
        $this->supervisor = $control->supervisor;
        $this->entrevistado = $control->entrevistado;
        $this->id_departamento = $control->id_departamento;
        $this->id_municipio = $control->id_municipio;
        $this->id_aldea = $control->id_aldea;
        $this->observacion = $control->observacion;
        $this->telefono = $control->telefono;
        $this->no_manzana = $control->no_manzana;
        $this->no_lote = $control->no_lote;
        $this->ubicacion_vivienda = $control->ubicacion_vivienda;
        $this->no_catastral = $control->no_catastral;
        $this->openModal();
    }

    public function delete($id)
    {
        Control::find($id)->delete();
        session()->flash('message', 'Control eliminado.');
        $this->controls = Control::all();
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
    public function resetForm() // Renombrado a resetForm
    {
        $this->control_id = null;
        $this->fecha_hora = '';
        $this->entrevistador = '';
        $this->supervisor = '';
        $this->entrevistado = '';
        $this->id_departamento = null;
        $this->id_municipio = null;
        $this->id_aldea = null;
        $this->observacion = '';
        $this->telefono = '';
        $this->no_manzana = '';
        $this->no_lote = '';
        $this->ubicacion_vivienda = '';
        $this->no_catastral = '';
    }
}
