<?php

namespace Controllers;

class CookieController
{
    
    public function createCookie(){
        setcookie('accept', true, time()+30*24*3600);
    }
    
    
}