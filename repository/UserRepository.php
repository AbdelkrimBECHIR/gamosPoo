<?php

class UserRepository
{
    public $dbh;

    public function __construct($dbh) 
    {
        $this->dbh=$dbh;
    }

      public function recupUserBdd(string $email, string $password):array|bool
    {
      
      $query = "SELECT * from utilisateurs where email=:email";
      $stmt = $this->dbh->prepare($query);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();
      
      return $stmt->fetch(PDO::FETCH_ASSOC);
      
    }
    
     public function addUserBdd(string $email, $hashedPassword):array|bool
  {
    $query = "INSERT INTO utilisateurs (prenom,email,mot_de_passe,role) VALUES(:prenom,:email,:mot_de_passe,:role)";
    $stmt = $this->dbh->prepare($query);
    $stmt->bindValue(':prenom', 'ab', PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':mot_de_passe', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':role', 'utilisateur', PDO::PARAM_STR);

     return $stmt->execute();
        
  
    
  }


}
