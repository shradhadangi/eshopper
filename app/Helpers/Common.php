<?php
 function getUserTempId(){
    if(session()->has('USER_TEMP_ID')==null){
        $rand = rand(111111111,9999999999);
        session()->put('USER_TEMP_ID',$rand);
        return $rand;
     }else{
        return session()->get('USER_TEMP_ID');
     }
 }

