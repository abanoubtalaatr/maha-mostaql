<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class UrWayService
{
    public function terminalId()
    {
        return config('urway.terminal_id');
    }

    public function urway_password()
    {
        return config('urway.password');
    }

    public function urway_secret_key()
    {
        return config('urway.secret_key');
    }

    public function request_hash($trackid, $terminalId, $password, $urway_secret_key, $amount, $currency)
    {
        $hash_details = "$trackid|$terminalId|$password|$urway_secret_key|$amount|$currency";
        $requestHash = hash('sha256', $hash_details);
        return $requestHash;
    }

    public function merchantIp()
    {
        return request()->server('SERVER_ADDR') ?? "10.10.10.10";
    }

    public function baseUrl()
    {
        if ($this->isTesting()) {
            return 'https://payments-dev.urway-tech.com';
        }

        return 'https://payments.urway-tech.com';
    }

    public function endpoint()
    {
        return 'URWAYPGService/transaction/jsonProcess/JSONrequest';
    }

    public function url()
    {
        return $this->baseUrl() . '/' . $this->endpoint();
    }

    public function action()
    {
        return "1";
    }

    public function country()
    {
        return "SA";
    }

    public function getMode()
    {
        return config('urway.mode');
    }

    protected function isProduction()
    {
        return $this->getMode() == 'production';
    }

    protected function isTesting()
    {
        return $this->getMode() == 'test';
    }

    public function callBackUrl()
    {
        return url('user/card/response');
        // return route('payment.response');
    }

    public function callBackUrlPay()
    {
        return url('payment/response');
        // return route('payment.response');
    }

    public function pay($request, $amount, $trackid, $paymentFor = 'service')
    {
        $user = User::find(auth()->id());
        $cardHolderName = $user->username;
        $terminalId = $this->terminalId();
        $urway_password = $this->urway_password();
        $urway_secret_key = $this->urway_secret_key();
        $currency = "SAR";


        $requestHash = $this->request_hash($trackid, $terminalId, $urway_password, $urway_secret_key, $amount, $currency);

        $body = [
            "amount" => $amount,
            "address" => 'Riyadh',
            "customerIp" =>$request->ip(), // Customer IP
            "city" => 'Riyadh',
            "trackid" => $trackid,
            "terminalId" => $terminalId,
            "action" => $this->action(),
            "password" => $urway_password,
            "cardHolderName" => $cardHolderName,
            "merchantIp" => $this->merchantIp(),
            "requestHash" => $requestHash,
            "country" => $this->country(),
            "currency" => $currency,
            "customerEmail" => $user->email,
            "zipCode" => '410209',
            "udf3" => "",
            "udf1" => "",
            "udf2" => $this->callBackUrl(),
            "udf4" => "",
        ];


        $url = $this->url();
        $client = new \GuzzleHttp\Client();


        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($body),
        ]);

        $bodyresponcs = $response->getBody();

        $result = json_decode($bodyresponcs);

        return $result->targetUrl."?paymentid=" . $result->payid;

    }

    public function save_card($trackid, $amount)
    {
        $user = User::find(auth()->id());
        $cardHolderName = $user->username;
        $terminalId = $this->terminalId();
        $urway_password = $this->urway_password();
        $urway_secret_key = $this->urway_secret_key();
        $currency = "SAR";

        $requestHash = $this->request_hash($trackid, $terminalId, $urway_password, $urway_secret_key, $amount, $currency);

        $body = [
            "amount" => $amount,
            "address" => 'Riyadh',
            "customerIp" => "10.10.10.10",
            "city" => 'Riyadh',
            "trackid" => $trackid,
            "terminalId" => $terminalId,
            "action" => 12,
            "instrumentType" => "DEFAULT",
            "password" => $urway_password,
            "cardHolderName" => $cardHolderName,
            "merchantIp" => $this->merchantIp(),
            "requestHash" => $requestHash,
            "country" => $this->country(),
            "currency" => $currency,
            "customerEmail" => $user->email,
            "zipCode" => '410209',
            "udf1" => $user->id,
            "udf2" => $this->callBackUrl(),
            "udf3" => "save_card",
            "udf4" => "",
            'udf5' => '',
            "tokenOperation" => "A",
            "tokenizationType" => "0",
            "cardToken" => '',
        ];

        $url = $this->url();
        $client = new \GuzzleHttp\Client();

        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($body),
        ]);

        $bodyresponcs = $response->getBody();
        $result = json_decode($bodyresponcs);
        // print_r($result);

        $res = [
            'success_url' => 'card/success',
            'failed_url' => 'card/failed',
        ];

        if (!empty($result->payid) && !empty($result->targetUrl)) {
            $res['responseCode'] = '000';
            $res['linkBasedUrl'] = $result->targetUrl . "?paymentid=" . $result->payid;
            $res['response'] = 'success';

        } else {
            $res['response'] = 'failed';
            info($result);
            // return 0;
        }

        return $res;

    }

    public function get_card($trackid, $amount, $cardToken, $paymentFor = 'wallet')
    {
        $user = User::find(auth()->id());
        $cardHolderName = clean($user->first_name) . " " . clean($user->last_name);
        $terminalId = $this->terminalId();
        $urway_password = $this->urway_password();
        $urway_secret_key = $this->urway_secret_key();
        $currency = "SAR";

        $requestHash = $this->request_hash($trackid, $terminalId, $urway_password, $urway_secret_key, $amount, $currency);

        $body = [
            "amount" => $amount,
            "address" => 'Riyadh',
            "customerIp" => "10.10.10.10",
            "city" => 'Riyadh',
            "trackid" => $trackid,
            "terminalId" => $terminalId,
            "action" => 1,
            // "instrumentType" => "DEFAULT",
            "password" => $urway_password,
            "cardHolderName" => $cardHolderName,
            "merchantIp" => $this->merchantIp(),
            "requestHash" => $requestHash,
            "country" => $this->country(),
            "currency" => $currency,
            "customerEmail" => $user->email,
            "zipCode" => '410209',

            "udf1" => $user->id,
            "udf2" => $this->callBackUrlPay(),
            "udf3" => $paymentFor,
            "udf4" => "",
            'udf5' => "",
            // "tokenOperation" => "A",
            "tokenizationType" => "0",
            "cardToken" => $cardToken,
        ];

        // dd($body);

        $url = $this->url();
        $client = new \GuzzleHttp\Client();

        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($body),
        ]);

        $bodyresponcs = $response->getBody();
        $result = json_decode($bodyresponcs);
        // print_r($result);

        $res = [
            'success_url' => 'payment/success',
            'failed_url' => 'payment/failed',
        ];

        if (!empty($result->payid) && !empty($result->targetUrl)) {
            $res['linkBasedUrl'] = $result->targetUrl . "?paymentid=" . $result->payid;
            $res['response'] = 'success';

        } else {
            $res['response'] = 'failed';
            info($result);
            // return 0;
        }

        return $res;

    }
}
