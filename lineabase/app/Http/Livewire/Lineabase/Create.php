<?php

namespace App\Http\Livewire\Lineabase;

use Livewire\Component;

class Create extends Component
{
    public $people = [];
    public $selected_id;
    public $name, $age, $sex, $relationship;
    public $ethnicity, $read_write, $study_now, $year_course, $total_year;

    // Input validation rules
    protected $rules = [
        'people.*.name' => 'required|string|NoNumbers|min:3',
        'people.*.age' => 'required|numeric|min:1|max:105',
        'people.*.sex' => 'required',
        'people.*.relationship' => 'required',
        'people.*.ethnicity' => 'required',
        'people.*.read_write' => 'required',
        'people.*.study_now' => 'required',
        'people.*.year_course' => 'required',
        'people.*.total_year' => 'required|numeric|max:50',

    ];

    // Messages rules
    protected $messages = [
        'people.*.name.required'  => 'El campo Nombre es obligatorio',
        'people.*.name.min'  => 'El campo Nombre debe tener mas de 3 caracteres',
        'people.*.name.string'  => 'El campo Nombre debe tener caracteres alfabéticos',
        'people.*.name.no_numbers'  => 'El campo Nombre no puedes guardar números',
        'people.*.age.required'  => 'El campo Edad es obligatorio',
        'people.*.sex.required'  => 'Es obligatorio seleccionar el Sexo de la persona',
        'people.*.relationship.required'  => 'Es obligatorio seleccionar el Parentesco de la persona ',
        'people.*.ethnicity.required'  => 'Es obligatorio seleccionar la Etnia de la persona ',
        'people.*.read_write.required'  => 'Es obligatorio seleccionar si Sabe Leer y Escribir la persona ',
        'people.*.study_now.required'  => 'Es obligatorio seleccionar si la persona esta Estudiando ',
        'people.*.year_course.required'  => 'Es obligatorio seleccionar el Año que esta Cursando la persona',
        'people.*.total_year.required'  => 'Es obligatorio seleccionar el Año que esta Cursando la persona',
        
    ];

    public function addPerson()
    {
        $this->people[] = [
            'name' => '',
            'age' => '',
            'sex' => '',
            'relationship' => '',
            'ethnicity' => '',
            'read_write' => '',
            'study_now' => '',
            'year_course' => '',
            'total_year' => '',
        ];
    }

    public function removePerson($index)
    {
        unset($this->people[$index]);
        $this->people = array_values($this->people);
    }

    public function render()
    {
        return view('livewire.lineabase.create');
    }

    public function store(){
        $this->validate();
        dd($this->people);
    }
}
