<?php


namespace App\pkg;


class SendMessage
{
    public function send($message,$to){

        $client=new \GuzzleHttp\Client();
        $res=$client->request('post','https://api.mista.io/sms',[
            'form_params'=>[
                'sms'=>$message,
                'from'=>'CAM.IS',
                'to'=>$to,
                'action'=>'send-action'
            ],
            'headers'=>[
                'x-api-key'=>'a2sya21rZ2R1OHJoeXMza3JjdXVpNXRqYzdoOHJnMDk= ',
                'Accept'=>'application/json'
            ]
        ]);
    }
}
