<?php

define('token', 'iltuotoken');

include 'source.php';

if($text == "/start"){
    mkdir("utenti");
    touch("utenti/$cid");
    $kiniteam->send($cid, "benvenuto nel bot per imparare il PhP");
}

if($text == "/count"){
    $scan = scandir("utenti");
    $tot = count($scan);
    $tot = $tot-2;
    $kiniteam->send($cid, "Ci sono $tot di persone iscritte al bot");
}

if($text == "tastiera"){
$keyboard = [
    ["Inline", "Inline2"],
    ["Inline3", "Inline4"],
];
    $kiniteam->keyboard($keyboard, "Benvenuto nel bot per imparare il PhP!", $cid);  
}

if($text == "Inline"){
    $but = array(array(array("text" => "Bottone 1", "url" => "www.google.com"),),);
    $kiniteam->inlineKeyboard($but, $cid, "Clicca questo pulsante per andare su google!");
}

if($text == "Inline2"){
    $but = array(array(array("text" => "Bottone 1", "url" => "www.google.com"),array("text" => "Bottone 2", "url" => "www.facebook.it"),),);
    $kiniteam->inlineKeyboard($but, $cid, "Clicca uno di questi due pulsanti \nper andare su google o su facebook!");
}

if($text == "Inline3"){
    $but[] = array(array("text" => "Bottone 1", "url" => "www.google.com"),);
    $but[] = array(array("text" => "Bottone 2", "url" => "www.facebook.it"),);
    $kiniteam->inlineKeyboard($but, $cid, "Clicca uno di questi due pulsanti \nper andare su google o su facebook!");
}

if($text == "Inline4"){
    $but = array(array(array("text" => "Bottone 1", "callback_data" => "ciao1"),),);
    $kiniteam->inlineKeyboard($but, $cid, "Clicca il bottone!");
}

if(callback($update)){
    if($cbdata == "ciao1"){
    $kiniteam->send($cbid, "hai cliccato il bottone 1");
    }
}