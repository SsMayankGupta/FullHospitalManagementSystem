<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GeneralDisChatTeam2 extends Component
{
    public $userdata = [];
    public $chatDetails = [];
    public $newChatMessage;

    public $login_id = null;
    public $chatId = null;

    public function mount()
    {

        $this->login_id = session('general_dis_dashboard_login')->gen_d_login_id;

        if (session()->exists('chatId')) {

            $this->chatId = session('chatId');

            $this->getChatDetails();
        } else {

            $this->getUserDetails();
        }
    }


    public function setChatId()
    {
        $this->validate(
            [
                'chatId' => "required|exists:general_discussion,general_dis_patient_id"
            ]
        );

        session()->put('chatId',  $this->chatId);

        $this->getChatDetails();
    }


    public function getUserDetails()
    {

        $this->userdata = DB::table('general_discussion')
            ->where('general_dis_patient_team_status', true)
            ->where('general_dis_patient_cancel_status', false)
            ->where('general_dis_patient_team_member_allocation', $this->login_id)
            ->select('general_dis_patient_id', 'general_dis_patient_name')
            ->get()
            ->toArray();
    }

    public function getChatDetails()
    {

        $this->chatDetails = DB::table('general_dis_chat_db')
            ->where(function ($query) {
                $query->where('from_id', $this->chatId)
                    ->where('to_id', $this->login_id);
            })
            ->orWhere(function ($query) {
                $query->where('to_id', $this->chatId)
                    ->where('from_id', $this->login_id);
            })
            ->get()
            ->toArray();
    }

    public function submitChatMessageHere()
    {

        $this->validate([
            'newChatMessage' => "required|string|max:1024|min:3"
        ]);

        $query1 = ['message' => trim($this->newChatMessage), 'from_id' => $this->login_id, 'to_id' => $this->chatId, 'message_time' => now()->toDateTimeString()];

        DB::table('general_dis_chat_db')->insert($query1);

        $this->chatDetails = (object)$query1;

        $this->newChatMessage = '';
    }

    public function switchUser()
    {
        session()->forget('chatId');
    }


    public function render()
    {
        return view('livewire.general-dis-chat-team2');
    }
}
