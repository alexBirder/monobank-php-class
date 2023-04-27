<?php

class mMono{

    private $token;

    public function __construct($token) {
        $this->token = $token;
    }

    public function monoRequest($order_id, $amount, $reference, $redirectUrl, $webhookUrl){
        $data["amount"] = $amount * 100;
        $data["merchantPaymInfo"]["reference"] = $reference."-".$order_id;
        $data["merchantPaymInfo"]["destination"] = 'Оплата заказа №'.$order_id;
        $data["redirectUrl"] = $redirectUrl;
        $data["webHookUrl"] = $webhookUrl;
        $headers[] = "X-Token: " . $this->token;

        $result["result"] = json_decode(self::send_request("https://api.monobank.ua/api/merchant/invoice/create", $headers, "POST", $data), true);
        die(json_encode(array('return' => "mono", 'url' => $result['result']['pageUrl'])));
    }

    static function send_request($url, $header, $type = 'GET', $param = []) {
        $descriptor = curl_init($url);
        if ($type != "GET") {
            curl_setopt($descriptor, CURLOPT_POSTFIELDS, json_encode($param));
            $header[] = 'Content-Type: application/json';
        }
        curl_setopt($descriptor, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($descriptor, CURLOPT_HTTPHEADER, $header);
        curl_setopt($descriptor, CURLOPT_CUSTOMREQUEST, $type);
        $itog = curl_exec($descriptor);
        curl_close($descriptor);
        return $itog;
    }

}
