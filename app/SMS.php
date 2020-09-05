<?php

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twilio\Rest\Client;

class SMS {
    private $enabled;
    private $client;
    private $logger;

    public function __construct()
    {
        $this->enabled = env('SEND_SMS', true);
        if ($this->enabled) {
            $this->client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
        } else {
            $this->logger = new Logger('log');
            $logFile = storage_path('logs/sms.log');
            $this->logger->pushHandler(new StreamHandler($logFile), Logger::INFO);
        }
    }

    public function sendpin($mobilenumber, $pin)
    {
        $this->sendsms($mobilenumber, 'Your GetFed Pin: '.$pin);
    }

    public function sendsms($mobilenumber, $message)
    {
        if ($this->enabled) {
            $this->client->messages->create($mobilenumber, [
                'from' => 'GetFed',
                'body' => $message,
            ]);
        } else {
            $this->logger->info($message, ['mobilenumber' => $mobilenumber]);
        }
    }

    /**
     * Send a message to the admin, e.g. when something goes wrong and they should check it out.
     */
    public function sendToAdmin(string $message)
    {
        $adminNumber = env('ADMIN_MOBILE_NUMBER');
        if (!$adminNumber) {
            $this->logger->warning('No admin mobile number has been set up. Set the ADMIN_MOBILE_NUMBER environment variable to get admin notifications.', []);
            return;
        }

        $this->sendsms($adminNumber, $message);
    }
}
