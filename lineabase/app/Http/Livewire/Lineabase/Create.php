<?php

namespace App\Http\Livewire\Lineabase;

use Livewire\Component;

class Create extends Component
{
    public $people = [];
    public $selected_id;
    public $name, $age;

    // Input validation rules
    protected $rules = [
        'people.*.name' => 'required|string|NoNumbers|min:3',
        'people.*.age' => 'required|numeric|min:1|max:105',

    ];

    // Messages rules
    protected $messages = [
        'people.*.name.required'  => 'El campo Nombre es obligatorio',
        'people.*.name.min'  => 'El campo Nombre debe tener mas de 3 caracteres',
        'people.*.name.string'  => 'El campo Nombre debe tener caracteres alfabéticos',
        'people.*.name.no_numbers'  => 'El campo Nombre no puedes guardar números',
        'people.*.age.required'  => 'El campo Edad es obligatorio',
        
    ];

    public function addPerson()
    {
        $this->people[] = [
            'name' => '',
            'age' => '',
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
