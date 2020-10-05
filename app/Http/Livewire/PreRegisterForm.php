<?php

namespace App\Http\Livewire;

use App\AddToMailchimp;
use App\preRegsiteredCooks;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use SendGrid;
use SendGrid\Mail\Mail;


class PreRegisterForm extends Component
{
    public $email;
//    public $thanks = "Leave your email below if you're interested in getting you cooking (and earning) on GetFed";
    public $thanks = "Sound good? Leave your email below.";

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        $user = new preRegsiteredCooks();
        $user->email = $this->email;
        $user->save();

        $this->reset();

        $this->thanks = "Thanks a lot. We'll be in touch.";

        $email = new Mail();
        $email->setFrom("hi@getfed.net", "GetFed HQ");
        $email->setSubject("Thanks for pre-registering as a GetFed Cook");
        $email->addTo($user->email);
        $email->addContent(
            "text/html", "
<style>
.bt {
font-weight: 400;
}
</style>
<strong>Welcome to the GetFed community 👋</strong>
<h5 class='bt'>We're delighted to have you onboard. You're on your way to becoming a GetFed home cook and earning extra cash by selling your beautiful home cooked meals to people in your local area.</h5>
<h5 class='bt'>In order to help us get ready for launch, we'd really like to get to know you a little better. Please click the link below and fill out our short cook survey. It only takes a minute and will help us to help you start selling!</h5>
<h5 class='bt'><a href='http://bit.ly/gfcpr'>Cook Survey</a></h5>
"
        );
        $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: '.$e->getMessage()."\n";
        }

        //        ADD TO MAILCHIMP
        $x = new AddToMailchimp();
        $x->addmailchimp($user->email);

        $tag = new AddToMailchimp();
        $tag->addmailchimptag($user->email, "prereg");

    }

    public function render()
    {
        return view('livewire.pre-register-form');

    }
}
