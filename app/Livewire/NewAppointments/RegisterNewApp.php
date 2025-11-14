<?php

namespace App\Livewire\NewAppointments;

use Livewire\Component;

use Tzsk\Otp\Otp;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Pest\Support\Str;

class RegisterNewApp extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    public $address = '';
    public $problem_statement = '';
    public $appointment_date = '';
    public $appointment_time = '';
    public $notes = '';
    public $preferred_contact = '';

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

    public function mount()
    {

        $ip = Request::ip();
        $location = Location::get("8.8.8.8");
        $this->address = $location->countryName . " , " . $location->cityName . " , " . $location->zipCode;

        $this->appointment_date = now()->toDateString();
    }

    public function submitPhone()
    {
        $this->validateOnly('phone');
    }

    public function submitEmail()
    {
        $this->validateOnly('email');
    }

    public function submitAddress()
    {
        $this->validateOnly('address');
    }

    public function submitdate()
    {
        $this->validateOnly('appointment_date');
    }

    public function submittime()
    {
        $this->validateOnly('appointment_time');
    }

    public function submit()
    {

        $this->validate();

        if (DB::table('NewAppointmentTable')->insert([
            'pateint_id' => Str::random(10),
            'pateint_name' => $this->name,
            'pateint_phone' => $this->phone,
            'pateint_email' => $this->email,
            'pateint_address' => $this->address,
            'pateint_appointment_time' => $this->appointment_time,
            'pateint_appointment_date' => $this->appointment_date,
            'pateint_prefered_contact' => $this->preferred_contact,
            'pateint_extra_info' => $this->notes,
            'created_at' => now()->toDateTimeString(),
        ])) {

            Session::put('NewAppointmentData', DB::table('NewAppointmentTable')->where('pateint_phone', $this->phone)->get()->toArray());

            Session::flash('success', 'Your appointment registration has been completed. Please wait for our team to respond. We’ll get back to you shortly.');
        } else {

            Session::flash('error', 'please retry.....');
        }
    }

    public function render()
    {
        return view('livewire.new-appointments.register-new-app');
    }
}
