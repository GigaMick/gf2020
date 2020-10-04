<?php
/**
 * Created by PhpStorm.
 * User: mick
 * Date: 05/09/2018
 * Time: 22:17
 */

namespace App;

use DrewM\MailChimp\MailChimp;

class AddToMailchimp
{

    public function addmailchimp($email)
    {

        $data = [
            'email' => $email,
            'status' => 'subscribed',
            // 'firstname' => $fname,
            // 'lastname'  => $sname,
        ];


        $apiKey = env('MAILCHIMP_API_KEY');
        $listId = env('MAILCHIMP_LIST_ID');

        $memberId = md5(strtolower($data['email']));
        $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
        $url = 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/'.$listId
            .'/members/';

        $json = json_encode([
            'email_address' => $data['email'],
            'status' => $data['status'],
        ]);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_USERPWD, 'user:'.$apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return;
    }

    public function addmailchimptag($email, $tag)
    {

        $apiKey = env('MAILCHIMP_API_KEY');
        $listId = env('MAILCHIMP_LIST_ID');

        $memberId = md5(strtolower($email));

        $m = new MailChimp($apiKey);
        $m->post("lists/".$listId."/members/".$memberId."/tags", [
            'tags' => [
                [
                    'name' => $tag,
                    'status' => 'active',
                ],
            ]
        ]);

        return;
    }
}