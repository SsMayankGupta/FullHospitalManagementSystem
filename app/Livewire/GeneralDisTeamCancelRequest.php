<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;



class GeneralDisTeamCancelRequest extends Component
{
    public $patien_data = [];
    public $selected = [];
    public $selectAll;

    public function mount()
    {
        $this->patien_data = DB::table('general_discussion')->where(['general_dis_patient_cancel_status' => true])->limit(5)->get()->toArray();
    }

    public function GeneralRequestCancelByPatient()
    {

        $this->patien_data = DB::table('general_discussion')->where(['general_dis_patient_cancel_status' => true])->get()->toArray();
    }

    public function confirmOneCancel($id, $index): void
    {
        if (DB::table('general_discussion')->where('general_dis_patient_id', $id)->delete()) {

            unset($this->patien_data[$index]);

            $this->patien_data = array_values($this->patien_data);

            session()->flash('general' . $id, 'Done');
        }
    }


    public function render()
    {
        return view('livewire.general-dis-team-cancel-request');
    }
}
