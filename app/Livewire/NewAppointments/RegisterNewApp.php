<?php

namespace App\Livewire\NewAppointments;

use Livewire\Component;

use Tzsk\Otp\Otp;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class RegisterNewApp extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    public $address = '';
    public $problem_statement = '';
    public $appointment_date = '';
    public $appointment_time = '';
    public $notes = ''; // Suggested field
    public $preferred_contact = ''; // Suggested field

    protected $rules = [
        'name' => 'required|string|min:2',
        'phone' => 'required|string|size:10',
        'email' => 'required|email',
        'address' => 'required|string',
        'problem_statement' => 'required|string|min:10',
        'appointment_date' => 'required|date|after_or_equal:now',
        'appointment_time' => 'required',
        'preferred_contact' => 'nullable|string|in:Phone,Email',
        'notes' => 'nullable|string|max:250',
    ];

    public function submitPhone()
    {

        $this->validateOnly('phone');
    }

    public function render()
    {
        return view('livewire.new-appointments.register-new-app');
    }
}
