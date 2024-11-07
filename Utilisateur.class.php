<?php

class Utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $age;
    private $titre;
    private $mot_de_passe;

    public function __construct($id, $nom, $prenom, $age, $mot_de_passe){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->titre = "utilisateur_primitif";
        $this->mot_de_passe = $mot_de_passe;
    }
    //Les getters
    public function getId(){
        return $this->id;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getAge(){
        return $this->age;
    }
    
    public function getTitre(){
        return $this->titre;
    }
    
    public function getMotDePasse(){
        return $this->mot_de_passe;
    }

    //Les setters
    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }
    public function setMot_de_passe($mdp){
        $this->mot_de_passe = $mdp;
    }
    // methode d'affichage
    public function afficherUtilisateur(){
        echo "ID : ".$this->id."<br>";
        echo "Nom : ".$this->nom."<br>";
        echo "Prénom : ".$this->prenom."<br>";
        echo "Age : ".$this->age."<br>";
        echo "Titre : ".$this->titre."<br>";
        echo "Mot de passe : ".$this->mot_de_passe."<br>";
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }	
    
    }

}


?>