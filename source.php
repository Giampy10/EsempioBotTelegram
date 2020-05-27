<?php

define('api', 'https://api.telegram.org/bot'.token.'/');

$data = file_get_contents("php://input");
$update = json_decode($data, true);

$kiniteam = new KiniTeam();

$message = $update["message"];
$text = $message["text"];
$cid = $update["message"]["from"]["id"];
$from = $message["from"];
$username = $from["username"];
$nome = $from["first_name"];
$cognome = $form["last_name"];

$cbid = $update["callback_query"]["from"]["id"];
$cbdata = $update["callback_query"]["data"];

function callback($up){
    return $up["callback_query"];
}

class KiniTeam{

public function apiRequest($metodo){
    $req = file_get_contents(api.$metodo);
    return $req;
}

public function send($id, $text){
    if(strpos($text, "\n")){
        $text = urlencode($text);
    }
    return $this->apiRequest("sendMessage?text=$text&parse_mode=HTML&chat_id=$id");
}

public function keyboard($tasti, $text, $cd){
    
$tasti = array(
"resize_keyboard" => true,
"keyboard" => $tasti,
);
    
$tasti3 = json_encode($tasti);
    
    if(strpos($text, "\n")){
        $text = urlencode($text);
    }

return $this->apiRequest("sendMessage?text=$text&parse_mode=Markdown&chat_id=$cd&reply_markup=$tasti3");
}

public function inlinekeyboard($menu, $chat, $text){
    
    if(strpos($text, "\n")){
        $text = urlencode($text);
    }
    
    $d2 = array(
    "inline_keyboard" => $menu,
    );
    
    $d2 = json_encode($d2);
    
    return $this->apiRequest("sendMessage?chat_id=$chat&parse_mode=Markdown&text=$text&reply_markup=$d2");
}
    
}