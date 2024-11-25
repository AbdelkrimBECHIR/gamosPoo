<?php

class CarController {

    public function CarRepository;

    public function __construct($dbh)
    {
         $this->CarRepository = new CarRepository($dbh);
    }

    public function CarAvailable(): array
    {
        $sql ='SELECT * FROM Voitures INNER JOIN Disponibilites ON status = disponible';
        $result = $conn->query($sql);
        if ($_SERVER ['REQUEST_METHOD'] === "POST" && (isset($_POST['date_debut'])) && (isset($_POST['date_fin']))){
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo" Voiture : " . $car['id_voiture']. " -Marque : " .$car['marque']. "Image: " .$car['image_path'].;
                }
            }else{
                echo "Aucune voiture disponible, revenez demain !";
            }
        }
    }

    public function list(): void // Récuperation de la liste envoyé par post
{

        $id_utilisateur = htmlentities($_POST['id_utilisateur']);
        $prenom = htmlentities($_POST['prenom']);
        $nom = htmlentities($_POST['nom']);
        $email = htmlentities($_POST['email']);
        $id_reservation = htmlentities($_POST['id_reservation']);
        $idCar = htmlentities($_POST['id_voiture']);
        $brand = htmlentities($_POST['marque']);
        $dispo = htmlentities($_POST['id_disponibilite']);
        $statut = htmlentities($_POST['statut']);
        $date_debut = htmlentities($_POST['date_debut']);
        $date_fin = htmlentities($_POST['date_fin']);
        $prix_total= htmlentities($_POST['prix_total']);
        $createDate = date("Y-m-d"); // Date de création de la réservation (date actuelle)
 
    }

    public function countPrice() : int { // fonction qui calcul le prix total
        // Date valide à tester
        $date_debut = new DateTime('2024-11-01'); // Initialisation de la date
        $date_fin = new DateTime('2024-11-10');
        
        // Calcul la différence entre deux dates
        $interval = $date_debut->diff($date_fin);
        
        // Avoir le nombre de jours
        $days = $interval->days;

        
        $prix_per_day = 15;  // prix par jour

        // Calcule le prix total
        $total_price = $days * $prix_per_day;

        echo "Le nombre de jour de réservation est de : " . $interval->format('%R%a days') . "\n";
        echo "Le prix total est de : " . $total_price . " \n";
        
        return $total_price; // Renvoi le prix total
    }

}

$reservation = new Reservation();
$reservation->countPrice();

?>
