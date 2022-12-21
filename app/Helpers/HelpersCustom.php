<?php

if(!function_exists('getTextByOrder')){
    function getTextByOrder($contents, $order, $isDescription = false){
        $text = '';
         foreach ($contents as $key => $content) {
           if($key + 1 == $order){
            if($isDescription){
              $text = strip_tags($content->description);
            }else{
              $text = $content->name;
            }
           }
         }
         return $text;
       }
}