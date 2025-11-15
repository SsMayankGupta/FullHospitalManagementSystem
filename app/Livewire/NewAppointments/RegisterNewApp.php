<?php

namespace App\Livewire\NewAppointments;

use Livewire\Component;
use Tzsk\Otp\Otp;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Exception;

use App\Events\NewAppointments\newAppointmentEventByPateint;

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

        if ($location) {
            $this->address = $location->countryName . " , " . $location->cityName . " , " . $location->zipCode;
        } else {
            $this->address = '';
        }
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
    public function submitDate()
    {
        $this->validateOnly('appointment_date');
    }
    public function submitTime()
    {
        $this->validateOnly('appointment_time');
    }

    public function submit()
    {
        $this->validate();

        $patientId = Str::random(10);

        $data = [
            'patient_id' => $patientId,
            'patient_name' => $this->name,
            'patient_phone' => $this->phone,
            'patient_email' => $this->email,
            'patient_address' => $this->address,
            'patient_appointment_time' => $this->appointment_time,
            'patient_appointment_date' => $this->appointment_date,
            'patient_prefered_contact' => $this->preferred_contact,
            'patient_extra_info' => $this->notes,
            'patient_problem_statement' => $this->problem_statement,
            'created_at' => now()->toDateTimeString(),
        ];


        try {

            if (DB::table('NewAppointmentTable')->insert($data)) {

                $appointment = DB::table('NewAppointmentTable')->where('patient_id', $patientId)->first();
                session()->put('NewAppointmentData', $appointment);
                session()->flash('success', 'Your appointment registration has been completed. Please wait for our team to respond. We’ll get back to you shortly.');

                event(new newAppointmentEventByPateint($data));
            } else {

                session()->flash('error', 'Please retry...');
            }
        } catch (Exception $exception) {

            session()->flash('error', 'A system error occurred. Please try again later.' . $exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.new-appointments.register-new-app');
    }
}
