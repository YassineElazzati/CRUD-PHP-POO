<?php

use eleve as GlobalEleve;

class eleve {
    private $id;
    private $nom;
    private $prenom;
    private $date_de_naissance;

    function __construct($id, $nom, $prenom, $date_de_naissance){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_de_naissance = $date_de_naissance;
    }

    function getId(){
        return $this->id;
    }

    function getNom(){
        return $this->nom;
    }
    function setNom($nom){
        $this->nom = $nom;
        
    }
    
    function getPrenom(){
        return $this->prenom;
    }
    function setPrenom($prenom){
        $this->prenom = $prenom;
        
    }
    function getDate_de_naissance(){
        return $this->date_de_naissance;
    }
    function setDate_de_naissance($date_de_naissance){
        $this->date_de_naissance = $date_de_naissance;
        
    }
    static function getEleveById($id){
        $bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
        $query = $bdd->query('SELECT * FROM eleve WHERE Id='.$id);
        $modifierEleve = $query->fetch();

        return new eleve($modifierEleve['Id'],$modifierEleve['nom'],$modifierEleve['prenom'],$modifierEleve['date_de_naissance']);
    }
    static function updateEleveById($eleve){
        $bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
        $query= $bdd->prepare('UPDATE eleve SET nom =:nom, prenom=:prenom, date_de_naissance=:ddn WHERE Id=:prout');
        $query->execute(array('prout'=>$eleve->getId() ,'nom'=>$eleve->getNom(),'prenom'=>$eleve->getPrenom(),'ddn'=>$eleve->getDate_de_naissance()));
    }
    function deleteEleve(){
        $bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
        $query= $bdd->prepare('DELETE FROM eleve WHERE Id=:prout');
        $query->execute(array('prout'=>$this->getId()));
    }
    static function createEleve($eleve){
        $bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
        $query= $bdd->prepare('INSERT INTO eleve (nom, prenom, date_de_naissance) VALUES (:nom, :prenom, :ddn)');
        $query->execute(array('nom'=>$eleve->getNom(), 'prenom'=>$eleve->getPrenom(), 'ddn'=>$eleve->getDate_de_naissance()));
    }
}

    ?>