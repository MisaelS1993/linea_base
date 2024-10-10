<?php

namespace App\Http\Livewire\Boleta;

use Livewire\Component;

class Crear extends Component
{
    public $selected_id;

    //variables del primer bloque de preguntas
    public $dateTime, $interviewer, $supervisor, $department, $municipality, $observation, $interviewee, $cellphone, $community, $manzana;
    public $lot, $locationNumber, $boletaNumber, $catastralNumber;

    //variables del segundo bloque de preguntas
    public $totalBuildings, $totalUnits, $buildingNumber, $wallMaterial, $roofMaterial, $floorMaterial, $buildingIssue, $buildingCondition;
    
    //variables del tercer bloque de preguntas
    public $unitNumber, $unitUsage, $unitStatus, $tenancy, $sex, $hasKitchen, $location;
    public $cookingOptions = [];
    public $waterConsumption = []; 
    public $unitPieces, $unitBathrooms, $bedroomPieces, $personsPerBedroom, $householdsInUnit, $residentsInUnit, $hasEmigrated;
    public $emigratedMales, $emigratedFemales, $CentralAmerica, $NorthAmerica, $SouthAmerica, $Europe, $WithinCountry,$Other;
    public $Economic, $GeneralizedViolence, $FamilyReunification, $OtherReason;

     //variables del cuarto bloque de preguntas
    public $violenceInCommunity, $violenceCases, $violenceToYou;
    public $violenceCasesToYou, $securityInNeighborhood, $theft, $gangs, $drugSales, $bars, $fights, $sexualAssaults, $otherCrimes;

    public $servicios = [];
   
    



    public function render()
    {
        return view('livewire.boleta.crear');
    }

    protected function rules()
    {
        $rules = [
            //variables del primer bloque de preguntas
            'dateTime' => 'required|date_format:Y-m-d\TH:i',
            'interviewer' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'observation' => 'nullable|string',
            'interviewee' => 'required|string|max:255',
            'cellphone' => 'required|numeric|min:8',
            'community' => 'required|string|max:255',
            'department' => 'required|string',
            'municipality' => 'required|string',
            'manzana' => 'required|numeric',
            'lot' => 'required|numeric',
            'locationNumber' => 'required|numeric',
            'boletaNumber' => 'required|numeric',
            'catastralNumber' => 'required|string',

            //variables del segundo bloque de preguntas
            'totalBuildings' => 'required|numeric',
            'unitUsage' => 'required|string'
        ];

        if ($this->totalBuildings >= 1) {
            $rules = array_merge($rules, [
                'totalUnits' => 'required|numeric',
                'buildingNumber' => 'required|numeric',
                'wallMaterial' => 'required',
                'roofMaterial' => 'required',
                'floorMaterial' => 'required',
                'buildingIssue' => 'required',
                'buildingCondition' => 'required',
                'unitNumber' => 'required|numeric',
                'unitStatus' => 'required|string'
            ]);

            if ($this->unitStatus <= 1) {
                $rules = array_merge($rules, [
                    'tenancy' => 'required|string',
                    'sex' => 'required|string',
                    'hasKitchen' => 'required|string',
                    'location' => 'required|string',
                    'cookingOptions' => 'required|array',
                    'waterConsumption' => 'required|array',
                    'unitPieces' => 'required|numeric',
                    'unitBathrooms' => 'required|numeric',
                    'bedroomPieces' => 'required|numeric',
                    'personsPerBedroom' => 'required|numeric',
                    'householdsInUnit' => 'required|numeric',
                    'residentsInUnit' => 'required|numeric',
                    'hasEmigrated' => 'required|in:si,no',
                    'violenceInCommunity' => 'required',
                    'violenceToYou' => 'required',
                    'securityInNeighborhood' => 'required',






                ]); 
                // Validaciones comunes para todos los servicios
                foreach ($this->servicios as $index => $servicio) {
                    $rules["servicios.$index.nombre"] = 'required|string';
                    if(!in_array($servicio['nombre'], [3, 11, 12, 13, 15, 16])){
                        $rules["servicios.$index.estado"] = 'required|string';
                    }

                    if(!in_array($servicio['nombre'], [7, 8, 9, 10, 11, 14, 15, 16, 17, 18])){
                        $rules["servicios.$index.dias"] = 'required|string';
                    }
                }

                if ($this->violenceInCommunity == 1) {
                    $rules = array_merge($rules, [
                        'violenceCases' => 'required|numeric',
                    ]);
                }

                if ($this->violenceToYou == 1) {
                    $rules = array_merge($rules, [
                        'violenceCasesToYou' => 'required|numeric',
                    ]);
                }

                if ($this->securityInNeighborhood == 2) {
                    $rules = array_merge($rules, [
                        'theft' => 'required',
                        'gangs' => 'required',
                        'drugSales' => 'required',
                        'bars' => 'required',
                        'fights' => 'required',
                        'sexualAssaults' => 'required',
                        'otherCrimes' => 'required',
                    ]);
                }
            }
            
        }

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function reglasValidacion($index)
    {
        return [
            "servicios.$index.nombre" => 'required',
            "servicios.$index.estado" => 'required_if:servicios.'.$index.'.nombre,!=,',
            "servicios.$index.dias" => 'required_if:servicios.'.$index.'.nombre,!=,',
        ];
    }
    
    public function agregarServicio()
    {
        $this->servicios[] = ['nombre' => '', 'estado' => '', 'dias' => ''];
    }

    public function eliminarServicio($index)
    {
        unset($this->servicios[$index]);
        $this->servicios = array_values($this->servicios);
    }

    public function store()
    {
        $this->validate();
        dd($this);
    }

}
