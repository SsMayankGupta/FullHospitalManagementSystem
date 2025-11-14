<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GeneralDisChatTeam extends Component
{
    public $userdata = [];
    public $chatId;
    public $chatDetails = [];
    public $newChatMessage;

    public function mount()
    {

        if (session()->exists('chatId')) {
            $this->chatId = session('chatId');
            $this->getUserDetails();
            $this->getChatDetails();
        }
    }

    public function setChatId()
    {
        session()->put('chatId',  $this->chatId);
        $this->getChatDetails();
    }

    public function getUserDetails()
    {
        $loginPassword = session('general_dis_dashboard_login.gen_d_login_password');

        $this->userdata = DB::table('gen_d_login_db')
            ->where('general_dis_patient_team_status', true)
            ->where('general_dis_patient_cancel_status', false)
            ->where('general_dis_patient_team_member_allocation', $loginPassword)
            ->select('general_dis_patient_id', 'general_dis_patient_name')
            ->get()
            ->toArray();
    }

    public function getChatDetails()
    {

        $this->chatDetails = DB::table('general_dis_chat_db')
            ->where(function ($query) {
                $query->where('from_id', $this->chatId)
                    ->where('to_id', session('general_dis_dashboard_login.gen_d_login_password'));
            })
            ->orWhere(function ($query) {
                $query->where('to_id', $this->chatId)
                    ->where('from_id', session('general_dis_dashboard_login.gen_d_login_password'));
            })
            ->get()
            ->toArray();
    }

    public function  submitNewChatMessage()
    {

        DB::table('general_dis_chat_db')->insert([
            'message' => $this->newChatMessage,
            'from_id' => session('general_dis_dashboard_login.gen_d_login_password'),
            'to_id' => session('chatId'),
            'message_time' => now(),
        ]);

        $this->getChatDetails();
    }

    //  Schema::create('general_dis_chat_db', function (Blueprint $table) {
    //         $table->string('message');
    //         $table->string('from_id');
    //         $table->string('to_id');
    //         $table->string('message_time');

    public function render()
    {
        return view('livewire.general-dis-chat-team');
    }
}
