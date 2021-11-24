<?php

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;

require_once('./vendor/autoload.php');
require_once('./key.php');
require_once ('./database/mysqlConnection.php');

$key= getKey();
$discord = new Discord(['token'=>$key]);

$discord->on('ready' , function (Discord $discord){
   echo 'bot is ready';
   $discord->on('message' , function ($message , $discord){
       $content =  $message->content;
       if (strpos($content , '?') === false) return;


           //get data from the database
           $data = explode(" ",$content);

           $res = search($data[1] , $data[2]);
           //replay with output from the database

            if($res != 0){
               $message->reply($data[2] . '=' .  $res);
           }else{
               $message->reply('can not find in our database');
           }


   });

    $discord->on('message' , function ($message , $discord){
        $content =  $message->content;
        if (strpos($content , '#') === false) return;

        $data = explode(" ",$content);
       if(insert($data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],
           $data[12],$data[13],$data[14],$data[15])){
           $message->reply('New record created successfully');
       }else{
           $message->reply('can not add new record');
       }
    });
});
$discord->run();


$discord->close();