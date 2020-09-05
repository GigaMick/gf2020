<?php

    namespace App;

    use Mail;
    use App\Mail\cookVerification;
    use Geocode;
    use InvalidArgumentException;

    final class UserVerifier {

        /**
         * Get a normalised mobile number for twilio to use.
         */
        public function formatMobile($mobile) 
        {
            //Format mobile number into +447 instead of 07 and drop spaces, dashes and brackets
            $mobile = str_replace([' ', '-', '(', ')'], '', $mobile);
            return preg_replace('/^07/', '+447', $mobile);
        }

        /**
         * Format the given mobile and ensure mobile is in E.164 format
         */
        public function validateMobile($mobile)
        {
            $mobile = $this->formatMobile($mobile);

            if (!preg_match('/^\+[1-9]\d{5,14}$/', $mobile)) {
                throw new InvalidArgumentException('Invalid mobile number format');
            }

            return $mobile;
        }

        /**
         * Create a new PIN for a user, save it to the database and send it.
         */
        public function sendNewPin(User $user)
        {

            $pin = rand(10000, 99999);
            $user->pin = $pin;
            $user->pin_confirmed_at = NULL;
            $user->save();

            $s = new SMS();
            $s->sendpin($user->mobile, $pin);
        }

        /**
         * Send a verification email to confirm the email is valid.
         * Not required for social logins as Google etc will have verified it already.
         */
        public function verifyEmail(User $user)
        {

            $user->email_verification_sent_at = new \DateTime();
            $user->save();
            Mail::to($user->email)->send(new cookVerification($user));


        }

        public function verifyAndSetPostcode(User $user, $postcode)
        {

            if ( ! $postcode)
            {
                throw new \InvalidArgumentException('Invalid postcode.');
            }
            //Get address data from Google geocode API
            $response = Geocode::make()->address($postcode);
            if ( ! $response || ! $response->response)
            {
                throw new \InvalidArgumentException('Invalid postcode.');
            }

            $postcode = $response->response->address_components[0]->long_name;
            $street = $response->response->address_components[1]->long_name;
            $city = $response->response->address_components[2]->long_name;
            $country = $response->response->address_components[3]->short_name;
            $lat = $response->response->geometry->location->lat;
            $lng = $response->response->geometry->location->lng;

            if ( ! $user->location)
            {
                $user->location = new cookLocation();
            }

            $user->location->fill([
                'user_id'  => $user->id,
                'postcode' => $postcode,
                'street'   => $street,
                'city'     => $city,
                'country'  => $country,
                'lat'      => $lat,
                'lng'      => $lng,
            ]);
            $user->location->save();
        }
    }
