<?php

class LogoutController
{
    public $logoutRepository;

    

    public function __construct($logoutRepository)
    {
        $this->logoutRepository= $logoutRepository ;
    }
    
    public function page() 
        
    {
        require "views\header.php";
        require "views\logout.html";

        $this->logoutRepository->logOut();

        require "views/footer.php";

    }
}