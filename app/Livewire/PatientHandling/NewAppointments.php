<?php

namespace App\Livewire\PatientHandling;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\doctors_registration;

class NewAppointments extends Component
{

    public $pateintNewData;

    public function mount()
    {

        $this->pateintNewData = DB::table('NewAppointmentTable')->where('patient_allocated_dr_confirmation', false)->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.patient-handling.new-appointments');
    }
}
