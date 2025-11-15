<?php

namespace App\Livewire\PatientHandling;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\doctors_registration;

class NewAppointments extends Component
{

    public $patientNewData;
    public $doctorsList;

    public $doctor_id;
    public $message;
    public $patient_id;

    protected $rules = [
        'doctor_id' => 'required|exists:doctors_registrations,dr_id',
        'message' => 'required|string|max:2024',
        'patient_id' => 'required|exists:NewAppointmentTable,patient_id',
    ];

    public function mount()
    {

        $this->patientNewData = DB::table('NewAppointmentTable')->where('patient_allocated_dr_confirmation', false)->limit(3)->get();

        $this->doctorsList = doctors_registration::select(['dr_id', 'dr_name'])->get()->toArray();
    }

    public function getMoreResults()
    {
        $patientIdsArray = $this->patientNewData->pluck('patient_id')->toArray();

        $more = DB::table('NewAppointmentTable')
            ->where('patient_allocated_dr_confirmation', false)
            ->whereNotIn('patient_id', $patientIdsArray)
            ->get();

        // ensure patientNewData is a collection
        if (! $this->patientNewData instanceof \Illuminate\Support\Collection) {
            $this->patientNewData = collect($this->patientNewData);
        }

        // merge collections and reindex
        $this->patientNewData = $this->patientNewData->concat($more)->values();
    }

    public function submit()
    {

        $this->validate();

        dd($this);
    }


    public function render()
    {
        return view('livewire.patient-handling.new-appointments');
    }
}
