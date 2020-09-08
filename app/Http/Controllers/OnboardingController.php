<?php

namespace App\Http\Controllers;

use App\GetGeography;
use App\SMS;
use App\UserVerifier;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jcf\Geocode\Geocode;
use libphonenumber\PhoneNumber;


class OnboardingController extends Controller
{
    public function OBChoosePath()
    {
        return view('onboarding.choose-path');
    }

    public function BasicDetails($token)
    {

        return view('onboarding/Basic_Details', compact('token'));
    }

    public function storeBasicDetails(Request $request)
    {

        $referralcode = \Illuminate\Support\Str::random('6');

        $user = new User();
        $user->email = $request->email;
        $user->firstname = "";
        $user->surname = "";
        $user->password = Hash::make($request->password);
        $user->pin = rand(00000, 99999);
        $user->token = Str::uuid();
        $user->email_verification_token = Str::uuid();
        $user->address_verification_pin = rand(00000, 99999);
        $user->referral_code = $referralcode;
        $user->status = 99;
        if($request->type == "cook") {$user->is_cook = true ;}
        $user->save();

        // Only cooks get the cook role... obviously
        if($request->type == "cook"){$user->assignRole('cook');}

        // everyone who signs up should have a customer role
        $user->assignRole('customer');

        Auth::login($user);

        return redirect('/ob/display-name');
    }

    public function DisplayName()
    {
        $user = Auth::user();

        if($user->is_cook) {
            $message = "This is how you'll be known on the platform. Eg, in search results etc";
        } else {
            $message = "This will be your display name. For example if you write reviews etc";
        }

        return view('onboarding/Display_Name', compact('message', 'user'));
    }

    public function storeDisplayName(Request $request)
    {
        $user = Auth::user();
        $user->firstname = $request->firstname ?? "";
        $user->surname = $request->surname ?? "";
        $user->username = $request->username;
        $user->save();

        return redirect('ob/address');
    }

    public function Address()
    {
        $user = Auth::user();

        if($user->is_cook) {
            $message = "Where are you cooking?";
            $message2 = "We need your address to arrange deliveries and collections";

        } else {
            $message = "Where will we be delivering?";
            $message2 = "We need your address so we know where to deliver";
        }

        return view('onboarding/Address', compact('message', 'message2'));
    }

    public function storeAddress(Request $request)
    {
        $user = Auth::user();

        $geog = new GetGeography();
        $address = $geog->getLatLng($request->postcode);

        $lat = $address->response->geometry->location->lat;
        $lng = $address->response->geometry->location->lng;

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
        $user->lat = $lat;
        $user->lng = $lng;
        $user->house_number = $request->house_number;

        $user->save();


        return view('onboarding/Confirm_Address', compact('user'));
    }

    public function storeConfirmedAddress(Request $request)
    {

        $user = Auth::user();
        $user->house_number = $request->house_number;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->save();

        return redirect('/ob/mobile');
    }


    public function Mobile()
    {
        $error = "";
        return view('onboarding/Mobile', compact('error'));
    }

    public function storeMobile(Request $request)
    {

        $mobile = $request->mobile;
        $uv = new UserVerifier();
        $p = $uv->validateMobile($mobile);

        if ($p == 2) {
            $error = "Phone number the wrong length. Maybe you missed a digit?";
            return view('onboarding/Mobile', compact('mobile', 'error'));
        }

        if ($p == 1) {
            $error = "Invalid phone number format";
            return view('onboarding/Mobile', compact('mobile', 'error'));
        }

        $user = Auth::user();
        $user->mobile = $request->mobile;
        $user->save();

        $pin = new SMS();
        $pin->sendpin($user->mobile, $user->pin);

        return redirect('ob/pin');
    }

    public function Pin()
    {
        return view('onboarding/Pin');
    }

    public function storePin(Request $request)
    {
        $user = Auth::user();
        $pin = $request->pin;
        if ($pin == $user->pin) {
            return redirect('ob/summary');
        } else {
            return back()->with('success', 'Sorry that PIN is incorrect');
        }
    }

    public function Summary()
    {
        return view('onboarding/Summary');
    }

    public function storeSummary()
    {
        return redirect('ob/summary');
    }


}
