<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Events\general_dis_accepted_by_team;

class GeneralDiscussionTeamNewUpdates extends Component
{

    public $patien_data = [];

    public $selected = [];
    public $login_id;

    public function mount()
    {

        $this->login_id = session('general_dis_dashboard_login')->gen_d_login_id;

        $this->patien_data = DB::table('general_discussion')
            ->where('general_dis_patient_team_status', false)
            ->where('general_dis_patient_cancel_status', false)
            ->orderBy('created_at')
            ->limit(5)
            ->get()->toArray();
    }

    public function getGeneralDetailsUpdates()
    {

        $this->patien_data = DB::table('general_discussion')
            ->where('general_dis_patient_team_status', false)
            ->where('general_dis_patient_cancel_status', false)
            ->orderBy('created_at')
            ->get()->toArray();
    }

    public function confirmOne($id, $index): void
    {
        $result = DB::table('general_discussion')
            ->where('general_dis_patient_id', $id)
            ->update([
                'general_dis_patient_team_member_allocation' => $this->login_id,
                'general_dis_patient_team_status' => true,
            ]);

        if ($result > 0) {

            event(new general_dis_accepted_by_team($id));

            session()->flash('general' . $id, 'Done');

            unset($this->patien_data[$index]);

            array_values($this->patien_data);
        } else {

            session()->flash('general' . $id, 'Error');
        }
    }

    public function confirmSelected(): void
    {

        if (DB::table('general_discussion')->whereIn('general_dis_patient_id', $this->selected)->update([
            'general_dis_patient_team_member_allocation' => $this->login_id,
            'general_dis_patient_team_status' => true,
        ]) > 0) {

            $selected = $this->selected;
            $this->patien_data = array_values(array_filter($this->patien_data, function ($item) use ($selected) {
                $idh = $item->general_dis_patient_id;
                event(new general_dis_accepted_by_team($idh));
                return !in_array($idh, $selected);
            }));
        }

        $this->reset('selected');
    }

    public function render()
    {
        return view('livewire.general-discussion-team-new-updates');
    }
}
