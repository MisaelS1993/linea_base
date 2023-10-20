<?php

namespace App\Http\Livewire\Lineabase;

use Livewire\Component;

class Create extends Component
{
    public $date;


    public $people = [];
    public $selected_id;
    public $name, $age, $sex, $relationship, $ethnicity, $read_write, $study_now, $year_course, $total_year;
    public $profession_trade, $activity,  $dedicated_sector,$employment_sector, $organization;
    public $Community_organization, $institutions, $loan, $consignment, $planification;


    // Messages rules
    protected $messages = [
        'people.*.name.required'  => 'El campo Nombre es obligatorio',
        'people.*.name.min'  => 'El campo Nombre debe tener mas de 3 caracteres',
        'people.*.name.string'  => 'El campo Nombre debe tener caracteres alfabéticos',
        'people.*.name.no_numbers'  => 'El campo Nombre no puedes guardar números',
        'people.*.age.required'  => 'El campo Edad es obligatorio',
        'people.*.age.required'  => 'El campo Edad es obligatorio',
        'people.*.age.numeric'  => 'El campo Edad tiene que ser numerico',
        'people.*.age.max'  => 'El campo Edad tiene que ser menor la cantidad de años ingresados',
        'people.*.sex.required'  => 'Es obligatorio seleccionar el Sexo de la persona',
        'people.*.relationship.required'  => 'Es obligatorio seleccionar el Parentesco de la persona ',
        'people.*.ethnicity.required'  => 'Es obligatorio seleccionar la Etnia de la persona ',
        'people.*.read_write.required'  => 'Es obligatorio seleccionar si Sabe Leer y Escribir la persona ',
        'people.*.study_now.required'  => 'Es obligatorio seleccionar si la persona esta Estudiando ',
        'people.*.year_course.required'  => 'Es obligatorio seleccionar el Año que esta Cursando la persona',
        'people.*.total_year.required'  => 'Es obligatorio seleccionar el Año que esta Cursando la persona',
        'people.*.total_year.required'  => 'El campo Total de Años cursados es requerido',
        'people.*.total_year.numeric'  => 'El campo Total de Años cursados debe ser numérico',
        'people.*.total_year.max'  => 'El campo Total de Años cursados debe ser menor a 50 años de estudio',
        'people.*.civil_status.required'  => 'Es obligatorio seleccionar el Estado Civil de la persona',
        'people.*.job.required'  => 'El campo Trabaja es requerido',
        'people.*.occupation.required'  => 'El campo Ocupación Actual es obligatorio',
        'people.*.occupation.min'  => 'El campo Ocupación Actual debe tener mas de 3 caracteres',
        'people.*.occupation.string'  => 'El campo Ocupación Actual debe tener caracteres alfabéticos',
        'people.*.occupation.no_numbers'  => 'El campo Ocupación Actual no puede guardar números',
        'people.*.profession_trade.required'  => 'El campo Profesión u Oficio es obligatorio',
        'people.*.profession_trade.min'  => 'El campo Profesión u Oficio debe tener mas de 3 caracteres',
        'people.*.profession_trade.string'  => 'El campo Profesión u Oficio debe tener caracteres alfabéticos',
        'people.*.profession_trade.no_numbers'  => 'El campo Profesión u Oficio no puede guardar números',
        'people.*.monthly_income.required'  => 'El campo Ingreso Mensual es requerido',
        'people.*.monthly_income.numeric'  => 'El campo Ingreso Mensual debe ser numérico',
        'people.*.activity.required'  => 'El campo Que actividad económica realiza es obligatorio',
        'people.*.sector.required'  => 'El campo En que Sector esta Contratado es obligatorio',
        'people.*.dedicated_sector'  => 'El campo A que Sector se Dedica es obligatorio',
        'people.*.employment_sector'  => 'El campo Cuanto Empleo Genera el Sector es obligatorio',
        'people.*.organization'  => 'El campo Organización a la que Pertenece es obligatorio',
        'people.*.Community_organization'  => 'El campo Participa en Organizaciones de la Comunidad es obligatorio',
        'people.*.institutions.required'  => 'El campo Instituciones que Han Apoyado es obligatorio',
        'people.*.institutions.min'  => 'El campo Instituciones que Han Apoyado debe tener mas de 3 caracteres',
        'people.*.institutions.string'  => 'El campo Instituciones que Han Apoyado debe tener caracteres alfabéticos',
        'people.*.institutions.no_numbers'  => 'El campo Instituciones que Han Apoyado no puedes guardar números',
        'people.*.loan'  => 'El campo Ha obtenido un Prestamo es obligatorio',
        'people.*.consignment'  => 'El campo Cuanto Recibe de Remesa es obligatorio',
        'people.*.planification'  => 'El campo Método de Planificación es obligatorio',
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
            'civil_status' => '',
            'job' => '',
            'occupation' => '',
            'profession_trade' => '',
            'monthly_income' => '',
            'activity' => '',
            'sector' => '',
            'dedicated_sector' => '',
            'employment_sector' => '',
            'organization' => '',
            'Community_organization' => '',
            'loan' => '',
            'consignment' => '',
            'planification' => '',
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


    public function store()
    {
        foreach ($this->people as $person) {
            // Obtener los datos de la persona actual en el bucle
            $age = $person['age'];
            $job = $person['job'];
            $activity = $person['activity'];

            // Realizar validaciones basadas en la edad
            if ($age >= 1 && $age <= 3) {
                //person from 1 to 3 years
                $this->validate([
                    'people.*.name' => 'required|string|NoNumbers|min:3',
                    'people.*.age' => 'required|numeric|min:1|max:105',
                    'people.*.sex' => 'required',
                    'people.*.relationship' => 'required',
                    'people.*.ethnicity' => 'required',
                ]);
            }else if ($age >= 4 && $age <= 9) {
                //person from 4 to 9 years
                $this->validate([
                    'people.*.name' => 'required|string|NoNumbers|min:3',
                    'people.*.age' => 'required|numeric|min:1|max:105',
                    'people.*.sex' => 'required',
                    'people.*.relationship' => 'required',
                    'people.*.ethnicity' => 'required',
                    'people.*.read_write' => 'required',
                    'people.*.study_now' => 'required',
                    'people.*.year_course' => 'required',
                    'people.*.total_year' => 'required|numeric|max:50',
                ]);
            }else if ($age >= 10 && $age < 17) {
                //person from 10 to 17 years


                if ($job ==1){
                    $this->validate([
                        'people.*.job' => 'required',
                        'people.*.occupation' => 'required|string|NoNumbers|min:3',
                    ]);
                }

                    
                if ($activity ==2 ){
                    $this->validate([
                        'people.*.sector' => 'required',
                    ]);
                }
                if ($activity == 4){
                    $this->validate([
                        'people.*.sector' => 'required',
                    ]);
                }

                if($activity ==5){
                    $this->validate([
                        'people.*.sector' => 'required',
                    ]);
                 }

                if ($activity ==1){
                    $this->validate([
                        'people.*.dedicated_sector' => 'required',
                        'people.*.employment_sector' => 'required',
                        'people.*.organization' => 'required',
                        'people.*.institutions' => 'required|string|NoNumbers|min:3',
                    ]);
                }

                $this->validate([
                    'people.*.name' => 'required|string|NoNumbers|min:3',
                    'people.*.age' => 'required|numeric|min:1|max:105',
                    'people.*.sex' => 'required',
                    'people.*.relationship' => 'required',
                    'people.*.ethnicity' => 'required',
                    'people.*.read_write' => 'required',
                    'people.*.study_now' => 'required',
                    'people.*.year_course' => 'required',
                    'people.*.total_year' => 'required|numeric|max:50',
                    'people.*.civil_status' => 'required',
                    'people.*.job' => 'required',
                    'people.*.profession_trade' => 'required|string|NoNumbers|min:3',
                    'people.*.monthly_income' => 'required|numeric',
                    'people.*.activity' => 'required',
                    'people.*.Community_organization' => 'required',
                ]);

            }else {
                $this->validate([
                    'people.*.name' => 'required|string|NoNumbers|min:3',
                    'people.*.age' => 'required|numeric|min:1|max:105',
                    'people.*.sex' => 'required',
                    'people.*.relationship' => 'required',
                    'people.*.ethnicity' => 'required',
                ]);
            }

        }

        dd($this->people);
    }
}
