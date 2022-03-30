<?php

class Viber
{
    private $url_api = "https://chatapi.viber.com/pa/broadcast_message/";

    private $token = "4bc4f421ef27d17d-e33fc30663176ef6-3f61f1dc6caed333";

    public function message_post
    (
        $from,          // ID администратора Public Account.
        array $sender,  // Данные отправителя.
        $text           // Текст.
    )
    {
        $data["receiver"] = $from;
        $data["min_api_version"]=2;
        $data["broadcast_list"]=[
          "FhxFp4epKPMNqFD9SOkYqA==",
          "2yBSIsbzs7sSrh4oLm2hdQ=="
        ];
        $data['text']   = $text;
        return $this->call_api('post', $data);
    }

    private function call_api($method, $data)
    {
        $url = $this->url_api.$method;

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\nX-Viber-Auth-Token: ".$this->token."\r\n",
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        $fd = fopen("/home/bitrix/www/bot_viber.txt","a"); 
        fwrite($fd, $response ."\r\n"); 
        fclose($fd);

        return json_decode($response);
    }
}
