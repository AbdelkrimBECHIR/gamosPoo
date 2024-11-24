CREATE DATABASE db_Gamospoo;

USE db_Gamospoo;

-- Création de la table Utilisateurs
CREATE TABLE Utilisateurs (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    pseudo VARCHAR(100),
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin','utilisateur') NOT NULL
    
);

-- Création de la table Voitures (qui sera référencée dans Disponibilites)
CREATE TABLE Voitures (
    id_voiture INT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(100) NOT NULL,
    image_path VARCHAR(255) DEFAULT NULL
);



-- Création de la table Reservations (qui référence Utilisateurs et Voitures)
CREATE TABLE Reservations (
    id_reservation INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    id_voiture INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    prix_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id_utilisateur) ON DELETE CASCADE,
    FOREIGN KEY (id_voiture) REFERENCES Voitures(id_voiture) ON DELETE CASCADE
);

-- Création de la table Disponibilites (qui référence Voitures)
CREATE TABLE Disponibilites (
    id_disponibilite INT PRIMARY KEY AUTO_INCREMENT,
    id_voiture INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut ENUM('disponible', 'reserve') NOT NULL,
    FOREIGN KEY (id_voiture) REFERENCES Voitures(id_voiture) ON DELETE CASCADE
);