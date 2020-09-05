<?php

namespace App\Http\Controllers;

use App\SMS;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jcf\Geocode\Geocode;


class OnboardingController extends Controller
{
    public function OBChoosePath()
    {
        return view('onboarding.choose-path');
    }

    public function cookBasicDetails()
    {
        return view('onboarding/OB_Cook_Basic_Details');
    }

    public function storeCookBasicDetails(Request $request)
    {

        $referralcode = \Illuminate\Support\Str::random('6');

        $user = new User();
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->surname = $request->surname;
        $user->password = Hash::make($request->password);
        $user->pin = rand(00000, 99999);
        $user->token = Str::uuid();
        $user->email_verification_token = Str::uuid();
        $user->address_verification_pin = rand(00000, 99999);
        $user->referral_code = $referralcode;
        $user->status = 99;
        $user->save();

        $user->assignRole('cook');
        Auth::login($user);

        return redirect('/ob/cook-display-name');
    }

    public function cookDisplayName()
    {
        return view('onboarding/OB_Cook_Display_Name');
    }

    public function storeCookDisplayName(Request $request)
    {
        $user = Auth::user();
        $user->username = $request->username;
        $user->save();

        return redirect('ob/cook-address');
    }

    public function cookAddress()
    {

        return view('onboarding/OB_Cook_Address');
    }

    public function storeCookAddress(Request $request)
    {
        $user = Auth::user();

        $postcode = str_replace(' ', '', $request->postcode);
        $postcode = strtoupper($postcode);

        $address = Geocode::make()->address($postcode);
        foreach ($address->response->address_components as $a) {

            if ($a->types[0] == "postal_town") {
                $user->city = $a->long_name;
            }
            if ($a->types[0] == "route") {
                $user->address_1 = $a->long_name;
            }
            if ($a->types[0] == "postal_code") {
                $user->postcode = $a->long_name;
            }
            if ($a->types[0] == "country") {
                $user->country = $a->short_name;
            }
        }
        $user->house_number = $request->house_number;
        $user->save();


        return view('onboarding/OB_Cook_Confirm_Address', compact('user'));
    }

    public function storeConfirmedCookAddress(Request $request)
    {
        $user = Auth::user();
        $user->house_number = $request->house_number;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->save();

        return redirect('/ob/cook-mobile');
    }


    public function cookMobile()
    {
        return view('onboarding/OB_Cook_Mobile');
    }

    public function storeCookMobile(Request $request)
    {

        $user = Auth::user();
        $user->mobile = $request->mobile;
        $user->save();

        $pin = new SMS();
        $pin->sendpin($user->mobile, $user->pin);

        return redirect('ob/cook-pin');
    }

    public function cookPin()
    {
        return view('onboarding/OB_Cook_Pin');
    }

    public function storeCookPin(Request $request)
    {
        $user = Auth::user();
        $pin = $request->pin;
        if ($pin == $user->pin) {
            return redirect('ob/cook-summary');
        } else {
            return back()->with('success', 'Sorry that PIN is incorrect');
        }
    }

    public function cookSummary()
    {
        return view('onboarding/OB_Cook_Summary');
    }

    public function storeCookSummary()
    {
        return redirect('ob/cook-summary');
    }


}
