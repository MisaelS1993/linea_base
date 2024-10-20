<?php

namespace App\Http\Livewire\Boleta;

use Livewire\Component;
use App\Models\Control;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Aldea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\Edificacion;
// Asegúrate de importar el modelo Control

class ControlCrud extends Component
{
    //variable para el modal
    public $isModalOpen;
    //Vaiables para cargar datos de tablas ya creada
    public $departamentos; // Almacena los departamentos
    public $municipios = []; // Almacena los municipios filtrados
    public $aldeas = []; //Almacena aldeas

    //variables de la tabla Control
    public $controls, $control_id, $fecha_hora, $entrevistador, $supervisor, $id_departamento, $id_municipio, $id_aldeas;
    public $observacion, $telefono, $no_manzana, $no_lote, $ubicacion_vivienda, $no_catastral, $entrevistado;

    //Varibles de la tabla edificaciones
    public $edificacions, $edificacions_id, $total_edificaciones, $total_unidades, $no_edificacion, $material_paredes;
    public $material_techo, $material_piso, $problema_edificacion, $condicion_edificacion;

    // Abrir el modal
    public function openModal()
    {
        $this->isModalOpen = true;
        $this->dispatchBrowserEvent('open-modal'); // Disparar evento para abrir modal
    }

    // Cerrar el modal
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->dispatchBrowserEvent('close-modal'); // Disparar evento para cerrar modal
    }

    // Reiniciar los campos del formulario
    public function resetForm()
    {
        // Variables de la tabla Control
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

        // Variables de la tabla Edificacion
        $this->edificacions_id = null; // Id de edificacion (clave primaria)
        $this->total_edificaciones = null;
        $this->total_unidades = null;
        $this->no_edificacion = null;
        $this->material_paredes = '';
        $this->material_techo = '';
        $this->material_piso = '';
        $this->problema_edificacion = '';
        $this->condicion_edificacion = '';
    }


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
        return view('livewire.boleta.control-crud', ['controls' => $this->controls,]);
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
            'total_edificaciones' => 'required|integer|min:0',

            //de aqui en adelante validamos las pregungtas que total_edificaciones sean mayor 1
            'total_unidades' => 'required_unless:total_edificaciones,0|nullable|integer|min:0|max:100',
            'no_edificacion' => 'required_unless:total_edificaciones,0|nullable|integer|min:0|max:100',
            'material_paredes' => 'required_unless:total_edificaciones,0|nullable|integer|in:1,2,3,4,5,6,7,8,9,10',
            'material_techo' => 'required_unless:total_edificaciones,0|nullable|integer|in:1,2,3,4,5,6,7,8,9',
            'material_piso' => 'required_unless:total_edificaciones,0|nullable|integer|in:1,2,3,4,5,6,7,8,9',
            'problema_edificacion' => 'required_unless:total_edificaciones,0|nullable|integer|in:1,2,3,4,5,6,7,8',
            'condicion_edificacion' => 'required_unless:total_edificaciones,0|nullable|integer|in:1,2,3',
        ];
    }

    public function store()
    {
        // Llama al método 'rules' para validar los datos
        $this->validate($this->rules());

        // Iniciar transacción
        DB::beginTransaction();
        try {
            $control = Control::updateOrCreate(
                ['id' => $this->control_id], // Si existe, lo actualiza, si no, lo crea
                [
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
                ]
            );

            // Guardar en la tabla 'Edificacion', asociada al 'Control'
            Edificacion::updateOrCreate(
                ['id' => $this->edificacions_id], // Si existe, lo actualiza, si no, lo crea
                [
                    'id_controls' => $control->id, // Aquí usamos el ID del control recién creado
                    'total_edificaciones' => $this->total_edificaciones,
                    'total_unidades' => $this->total_edificaciones == 0 ? null : $this->total_unidades,
                    'no_edificacion' => $this->total_edificaciones == 0 ? null : $this->no_edificacion,
                    'material_paredes' => $this->total_edificaciones == 0 ? null : $this->material_paredes,
                    'material_techo' => $this->total_edificaciones == 0 ? null : $this->material_techo,
                    'material_piso' => $this->total_edificaciones == 0 ? null : $this->material_piso,
                    'problema_edificacion' => $this->total_edificaciones == 0 ? null : $this->problema_edificacion,
                    'condicion_edificacion' => $this->total_edificaciones == 0 ? null : $this->condicion_edificacion,
                ]
            );


            DB::commit();

            session()->flash('message', $this->control_id ? 'Boleta actualizada.' : 'Boleta creada.');

            $this->resetForm(); // Llama al nuevo método
            $this->closeModal();
        } catch (\Exception $e) {
            // En caso de error, deshacer la transacción
            DB::rollBack();

            // Puedes lanzar una excepción o manejar el error como desees
            throw $e;
        }
    }

    public function edit($id)
    {
        // Obtener el registro de la tabla 'Control'
        $control = Control::findOrFail($id);
        $this->control_id = $control->id;
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

        // Obtener el registro relacionado de la tabla 'Edificacion' usando la clave foránea
        $edificacion = Edificacion::where('id_controls', $control->id)->first(); // Clave foránea
        if ($edificacion) {
            $this->edificacions_id = $edificacion->id; // ID de edificacion (clave primaria)
            $this->total_edificaciones = $edificacion->total_edificaciones;
            $this->total_unidades = $edificacion->total_unidades;
            $this->no_edificacion = $edificacion->no_edificacion;
            $this->material_paredes = $edificacion->material_paredes;
            $this->material_techo = $edificacion->material_techo;
            $this->material_piso = $edificacion->material_piso;
            $this->problema_edificacion = $edificacion->problema_edificacion;
            $this->condicion_edificacion = $edificacion->condicion_edificacion;
        } else {
            // Si no existe registro en la tabla 'Edificacion', se resetean los campos
            $this->resetEdificacionFields();
        }

        // Abrir modal o lo que sea necesario después de la carga de datos
        $this->openModal();
    }

    public function delete($id)
    {
        // Iniciar transacción
        DB::beginTransaction();

        try {
            // Primero eliminar el registro relacionado en 'Edificacion'
            Edificacion::where('id_controls', $id)->delete(); // Usando la clave foránea 'id_controls'

            // Luego, eliminar el registro en 'Control'
            Control::find($id)->delete();

            // Confirmar transacción
            DB::commit();

            // Mostrar mensaje de éxito
            session()->flash('message', 'Boleta eliminada.');

            // Actualizar la lista de controles (si lo necesitas en el frontend)
            $this->controls = Control::all();
        } catch (\Exception $e) {
            // Deshacer transacción si ocurre un error
            DB::rollBack();

            // Manejar el error según sea necesario
            throw $e;
        }
    }
}
