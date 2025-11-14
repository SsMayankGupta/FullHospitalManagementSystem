<?php

namespace App\Livewire\AppointmentsBooking;

use App\Events\General_discussion_event_class;
use App\Events\general_dis_cancel_by_patient_class;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class GeneralDiscussion extends Component
{

    public $name, $email, $phone, $gender, $pregnancy_status, $age_status, $problem_statement;

    protected $rules = [
        'name' => 'required|string|min:3|max:20',
        'email' => 'required|email',
        'phone' => 'required|max:10',
        'gender' => ['required'],
        'pregnancy_status' => 'nullable',
        'age_status' => 'required',
        'problem_statement' => 'required|max:1000',
    ];

    // public function mount()
    // {
    //     $user = 'Alice';
    //     $message = 'Hello from Laravel broadcasting!';
    //     event(new MessagePosted($user, $message)); // or ShouldBroadcastNow for no-queue testing
    //     return response()->json(['ok' => true]);
    // }

    public function NameValidation()
    {
        $this->validateOnly('name');
    }
    public function EmailValidation()
    {
        $this->validateOnly('email');
    }
    public function PhoneValidation()
    {
        $this->validateOnly('phone');
    }
    public function GenderValidation()
    {
        $this->validateOnly('gender');
    }

    public function AgeStatusValidation()
    {
        $this->validateOnly('age_status');
    }
    public function ProblemValidation()
    {
        $this->validateOnly('problem_statement');
    }

    public function submitForm()
    {
        session()->put('general_discussion_data', [
            'general_dis_patient_id' => "GeneralId" . Str::random(10),
            'general_dis_patient_name' => $this->name,
            'general_dis_patient_email' => $this->email,
            'general_dis_patient_phone' => $this->phone,
            'general_dis_patient_gender' => $this->gender,
            'general_dis_patient_preganency_status' => $this->pregnancy_status,
            'general_dis_patient_age_status' => $this->age_status,
            'general_dis_patient_problem' => $this->problem_statement,
            'created_at' => now(),
        ]);

        if (DB::table('general_discussion')->insert(session('general_discussion_data'))) {
            event(new General_discussion_event_class());
        } else {
            session()->forget('general_discussion_data');
        }
    }

    public function sessionDataUpdateForPatient()
    {
        $patientId = session('general_discussion_data.general_dis_patient_id');

        $data = DB::table('general_discussion')
            ->where('general_dis_patient_id', $patientId)
            ->first();

        if ($data) {
            session()->put('general_discussion_data', (array) $data);
        }
    }


    public function submitDataforget()
    {
        DB::table('general_discussion')->where('general_dis_patient_id', session('general_discussion_data.general_dis_patient_id'))->update(['general_dis_patient_cancel_status' => true]);
        session()->forget('general_discussion_data');
        // event(new general_dis_cancel_by_patient_class());
    }

    // public function aisuggestions()
    // {


    //     $apiKey = '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';

    //     $content = "You are a healthcare assistant AI helping patients through a hospital web platform.
    //         A patient provides the following details:
    //         Name: " . session('general_discussion_data.general_dis_patient_name') . "
    //         Age:  " . session('general_discussion_data.general_dis_patient_age_status') . "
    //         Gender:  " . session('general_discussion_data.general_dis_patient_gender') . "
    //         If the patient is female, also include:
    //         Pregnancy status:  " . session('general_discussion_data.general_dis_patient_preganency_status') . "
    //         Problem statement:  " . session('general_discussion_data.general_dis_patient_problem') . "
    //         Tasks:

    //         Summarize the patient's problem clearly and empathetically.

    //         Suggest possible explanations or solutions based on the symptoms and problem described.

    //         If the problem seems serious, complex, or urgent, advise that the patient should book an appointment for detailed examination and treatment.

    //         Make the language clear and supportive, suitable for a general patient audience.";

    //     $url = 'https://openrouter.ai/api/v1/chat/completions';

    //     $data = [
    //         'model' => 'minimax/minimax-m2:free',
    //         'messages' => [
    //             ['role' => 'user', 'content' => $content]
    //         ],
    //         'max_tokens' => 4000
    //     ];

    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //         'Authorization: Bearer ' . $apiKey
    //     ]);

    //     curl_setopt($ch, CURLOPT_VERBOSE, true);

    //     $response = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         echo 'Error: ' . curl_error($ch);
    //     } else {
    //         $result = json_decode($response, true);
    //         var_dump($result);
    //     }
    //     curl_close($ch);
    // }

    public function render()
    {
        return view('livewire.appointments-booking.general-discussion');
    }
}
