drop database etudiantInf;
CREATE DATABASE EtudiantInf;

USE EtudiantInf;



CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_passe VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'user'
);





CREATE TABLE inscription_etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_etudiant VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    date_naissance DATE NOT NULL,
    vacation VARCHAR(50) NOT NULL,
    sexe VARCHAR(10) NOT NULL,
    age INT NOT NULL,
    classe VARCHAR(50)NOT NULL, 
    telephone int(15) NOT NULL
);



CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- insert into utilisateur values('1','chery','carly','carly@gmail.com','carly134');
-- ALTER TABLE utilisateur ADD COLUMN role VARCHAR(50) NOT NULL DEFAULT 'user';
