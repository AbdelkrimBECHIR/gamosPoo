
<?php

class LogoutRepository
{
public function logOut()
    {
        session_start();
        session_unset(); 
        session_destroy(); 
       
        header("Location: \login");
        exit;
    }
}

