<?php

class LoginController{
   

    public function page(){
        require "views\header.php";
        require_once "views\login.html.php";
    }
}