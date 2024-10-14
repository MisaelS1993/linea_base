<?php

namespace App\Http\Livewire\Boleta;

use Livewire\Component;
use App\Models\Control;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Aldea;
use Illuminate\Support\Facades\Auth;
// Asegúrate de importar el modelo Control

class ControlCrud extends Component
{
    public $controls, $control_id, $fecha_hora, $entrevistador, $supervisor, $id_departamento, $id_municipio, $id_aldeas, $observacion, $telefono, $no_manzana, $no_lote, $ubicacion_vivienda, $no_catastral, $entrevistado;
    public $isModalOpen = false;

    public $departamentos; // Almacena los departamentos
    public $municipios = []; // Almacena los municipios filtrados
    public $aldeas = [];
    


    public function mount()
    {
        // Obtener todos los departamentos de la base de datos
        $this->departamentos = Departamento::all();
        if ($this->id_departamento) {
            $this->municipios = Municipio::where('departamento_id', $this->id_departamento)->get();
        }
        $this->aldeas = []; // Limpia las aldeas cuando cambia el departamento

        if (Auth::check()) {
            $this->entrevistador = Auth::user()->name; // Obtén el nombre del usuario logueado
        }
    }

    public function updatedIdDepartamento($value)
    {
        // Cuando se cambia el departamento, se obtienen los municipios correspondientes
        $this->municipios = Municipio::where('departamento_id', $value)->get();
        $this->aldeas = [];
    }

    // Cuando se selecciona un municipio, carga las aldeas correspondientes
    public function updatedIdMunicipio($value)
    {
        $this->aldeas = Aldea::where('municipio_id', $value)->get();
    }

    public function render()
    {
        // Obtener todos los registros de control con relaciones de aldea, municipio y departamento
        $this->controls = Control::with('Aldea', 'Municipio', 'Departamento')->get();

        return view('livewire.boleta.control-crud', [
            'controls' => $this->controls,
        ]);
        if (Auth::check()) {
            $this->entrevistador = Auth::user()->name; // Obtén el nombre del usuario logueado
        }
    }

    // Crear una nueva Boleta
    public function create()
    {
        $this->resetForm();
        $this->openModal();
        if (Auth::check()) {
            $this->entrevistador = Auth::user()->name; // Obtén el nombre del usuario logueado
        }
    }

    public function rules()
    {
        return [
            'fecha_hora' => 'required|date',
            'entrevistador' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'entrevistado' => 'required|string|max:255',
            'id_departamento' => 'required|integer',
            'id_municipio' => 'required|integer',
            'id_aldeas' => 'required|integer',
            'observacion' => 'nullable|string',
            'telefono' => 'required|string|max:15',
            'no_manzana' => 'required|string|max:10',
            'no_lote' => 'required|string|max:10',
            'ubicacion_vivienda' => 'required|string|max:255',
            'no_catastral' => 'required|string|max:20',
        ];
    }

    public function store()
    {
        // Llama al método 'rules' para validar los datos
        $this->validate($this->rules());

        Control::updateOrCreate(['id' => $this->control_id], [
            'fecha_hora' => $this->fecha_hora,
            'entrevistador' => Auth::user()->name,
            'supervisor' => $this->supervisor,
            'entrevistado' => $this->entrevistado,
            'id_departamento' => $this->id_departamento,
            'id_municipio' => $this->id_municipio,
            'id_aldeas' => $this->id_aldeas,
            'observacion' => $this->observacion,
            'telefono' => $this->telefono,
            'no_manzana' => $this->no_manzana,
            'no_lote' => $this->no_lote,
            'ubicacion_vivienda' => $this->ubicacion_vivienda,
            'no_catastral' => $this->no_catastral,
        ]);

        session()->flash('message', $this->control_id ? 'Boleta actualizada.' : 'Boleta creada.');

        $this->resetForm(); // Llama al nuevo método
        $this->closeModal();

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
        $this->id_aldeas = $control->id_aldeas;
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
        session()->flash('message', 'Boleta eliminada.');
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
        $this->id_aldeas = null;
        $this->observacion = '';
        $this->telefono = '';
        $this->no_manzana = '';
        $this->no_lote = '';
        $this->ubicacion_vivienda = '';
        $this->no_catastral = '';
    }
}
