<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Aldea;
use App\Models\Municipio;
use Livewire\WithPagination;

class AldeaCrud extends Component
{
    // Variable del modal
    public $isModalOpen = false;

    //Variables de tablas
    protected $aldeas;
    public  $municipios, $municipio_id, $descripcion, $aldea_id;

    //variables para busque de registros
    public $search = '';

    use WithPagination; // Importar el trait para paginación

    // Abrir el modal
    public function openModal()
    {
        $this->isModalOpen = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    // Cerrar el modal
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->dispatchBrowserEvent('close-modal');
    }

    // Reiniciar los campos del formulario
    public function resetFields()
    {
        $this->aldea_id = null;
        $this->descripcion = '';
        $this->municipio_id = '';
    }

    // Método para cargar registros
    public function loadDepartamentos()
    {
        $this->aldeas = Aldea::when($this->search, function ($query) {
            $query->where('descripcion', 'like', '%' . $this->search . '%');
        })->paginate(3);

        // Cargamos todos los departamentos
        $this->municipios = Municipio::all();
    }

    // Método para actualizar la paginación si es necesario
    public function updating()
    {
        $this->loadDepartamentos();
    }

    //Resetea la paginacion
    public function updatingSearch()
    {
        // Restablecer la paginación cuando se cambie el valor de búsqueda
        $this->resetPage();
    }

    /*//////////////////////////////////////////////////*/

    // Método para renderizar las aldeas y municipios
    public function render()
    {
        $this->loadDepartamentos();

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
        $this->loadDepartamentos();
    }

    // Eliminar una aldea
    public function delete($id)
    {
        Aldea::find($id)->delete();
        session()->flash('message', 'Aldea eliminada exitosamente.');
        // Resetea la paginación después de guardar o actualizar un registro
        $this->resetPage();
        $this->loadDepartamentos();
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
        // Resetea la paginación después de guardar o actualizar un registro
        $this->resetPage();
        $this->loadDepartamentos();
    }
}
