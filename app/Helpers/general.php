<?php

function getLang()
{
    return app()->getLocale()=='ar' ? "arabic" : "" ;
}
function uploadImage($folder ,$image){
    $image->store('/',$folder);
    $filename = $image->hashName();
    return $filename ;

}

function getLink(){
    return app()->getLocale()=='ar' ? 'assets/css/main_rtl.css' : '' ;
}

function highlight($name){
    $a =explode('/',url()->current()) ;
    if ($name == $a[4]){
        return "active" ;
    }

}

function adminHighlight($name){
    $a =explode('/',url()->current()) ;
    if ($name == $a[5]){
        return "active" ;
    }
}


function level($level){
    if ($level==1){
        return "level_1";
    }elseif ($level==2){
        return  "level_2";
    }elseif ($level==3){
        return  "level_3";
    }elseif ($level==4){
        return  "level_4";
    }
}
