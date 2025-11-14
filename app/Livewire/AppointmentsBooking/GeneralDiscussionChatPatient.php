<?php

namespace App\Livewire\AppointmentsBooking;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GeneralDiscussionChatPatient extends Component
{
    public $chatData;

    public $patient_id;
    public $patient_alloted_team_member_id;

    public $message = '';

    protected $rules = [
        'message' => 'required|min:2|max:255',
    ];

    public function mount()
    {

        $this->patient_id = session('general_discussion_data.general_dis_patient_id');
        $this->patient_alloted_team_member_id = session('general_discussion_data.general_dis_patient_team_member_allocation');
        $this->getChatData();
    }

    public function getChatData(): void
    {


        $this->chatData = DB::table('general_dis_chat_db')
            ->where(function ($query) {
                $query->where('from_id', $this->patient_alloted_team_member_id)
                    ->where('to_id', $this->patient_id);
            })
            ->orWhere(function ($query) {
                $query->where('from_id', $this->patient_id)
                    ->where('to_id', $this->patient_alloted_team_member_id);
            })
            ->get();
    }


    public function sendMessage()
    {
        $this->validateOnly('message');

        $dataEnter = [
            'message' => trim($this->message),
            'from_id' => $this->patient_id,
            'to_id' => $this->patient_alloted_team_member_id,
            'message_time' => now()->toDateTimeString(),
        ];

        DB::table('general_dis_chat_db')->insert($dataEnter);


        $this->chatData = (object) $dataEnter;

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.appointments-booking.general-discussion-chat-patient');
    }
}
