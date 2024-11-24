<?php

class LoginController{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);
    }

    public function page(){
        
        require "views\header.php";
        require_once "views\login.html.php";
       
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["user_mail"]) && isset($_POST["password"])) {
            $email = filter_var(trim($_POST["user_mail"]), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST["password"]);
            $errors = [];
         
            if (!preg_match("/^\d{3,6}$/", $password)) {
              $errors[] = "le mot de passe doit seulement entre 3 et 6 chiffres";
            }
          
            if (empty($email)) {
              $errors[] = " le mail doit etre renseigné";
            }
          
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errors[] = "email invalide";
            }
          
            if (empty($password)) {
              $errors[] = "le mot de passe doit etre renseigné";
            }
          
            if (!preg_match("/^\d{3,6}$/", $password)) {
              $errors[] = "le mot de passe doit seulement entre 3 et 6 chiffres";
            }
          
            if (!empty($errors)) {
              $_SESSION["error"] = $errors;
              header("location:/login");
              exit();
            }
            
           
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user=$this->userRepository->recupUserBdd($email,$hashedPassword);

            if($user){
                if (password_verify($_POST["password"], $user["mot_de_passe"])) {
                  $_SESSION["email"] = $user["email"];
                  $_SESSION["role"] = $user["role"];  
                  $_SESSION['prenom']=$user['prenom'];           
          
                  header("location:/login");

                } else {
                  $this->userRepository->addUserBdd($email,$hashedPassword);
                }
            }

            require "views/footer.php";
        }
    }

}