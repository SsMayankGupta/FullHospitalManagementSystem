<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;

use function Symfony\Component\Clock\now;

class GeneralDiscussionTeamLogin extends Component
{
    public $mobile = '';
    public $password = '';

    protected $rules = [
        'mobile' => 'required',
        'password' => 'required',
    ];

    public function getUserAgentDetails(): string
    {

        $agent = new Agent();
        $isMobile = $agent->isMobile();
        $isDesktop = $agent->isDesktop();
        $browser = $agent->browser();
        $platform = $agent->platform();

        return sprintf(
            "User is already logged in on a %s device using %s browser on %s platform.",
            $isMobile ? 'mobile' : ($isDesktop ? 'desktop' : 'unknown'),
            $browser ?: 'unknown browser',
            $platform ?: 'unknown platform'
        );
    }

    public function login()
    {
        $this->validate();

        if (!session()->has('general_dis_dashboard_login')) {

            $query1result = DB::table('gen_d_login_db')->where(['gen_d_login_password' => $this->password])->where('gen_d_login_phone', $this->mobile);

            if ($query1result->exists()) {

                $session_check = DB::table('sessions')->where(['password' => $this->password]);
                $ip = Request::ip();
                $chackone = $session_check->exists();

                if ($chackone) {

                    session()->flash('message', 'You are already logged in ' . $session_check->value('payload'));

                    session()->put([
                        'logoutDetailsDeleteSessionPassword' => $this->password
                    ]);

                    session()->flash('logout_massage', true);
                } else {

                    DB::table('sessions')->insert([
                        'id' => Str::random(),
                        'password' => $this->password,
                        'ip_address' => $ip,
                        'payload' => $this->getUserAgentDetails(),
                        'user_agent' => "",
                        'last_activity_at' => now()
                    ]);

                    session()->put("general_dis_dashboard_login", $query1result->first());

                    session()->flash('message', 'Login successful!');
                }
            } else {

                session()->flash('message', 'You are not register in our record please verify your password and phone number otherwise contact to administration.');
            }
        } else {

            session()->flash('message', 'You are required to logout first then reenter the details to login.');
        }

        $this->reset(['mobile', 'password']);
    }

    public function logoutInPreviousSystem()
    {

        if (DB::table('sessions')->where(['password' => session()->get('logoutDetailsDeleteSessionPassword')])->delete()) {
            session()->flash('message', 'Logout done now reenter your details to login');
            session()->forget('logoutDetailsDeleteSessionPassword');
        } else {
            session()->flash('message', 'Failed to Logout please try again.');
        }
    }

    public function logout()
    {
        session()->forget('general_dis_dashboard_login');
    }


    public function render()
    {
        return view('livewire.general-discussion-team-login');
    }
}
