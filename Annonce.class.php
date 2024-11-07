<?php
class Annonce {
    private $id;
    private $description;
    private $date;
    private $auteur;
    private $destinataire; // Cette propriété sera utilisée pour les annonces privées

    public function __construct($id, $description, $date, $auteur, $destinataire = "publique") {
        $this->id = $id;
        $this->description = $description;
        $this->date = $date;
        $this->auteur = $auteur;
        $this->destinataire = $destinataire; // Définit le destinataire s'il y en a un
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getDestinataire() {
        return $this->destinataire; // Retourne le destinataire
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function setDestinataire($destinataire) {
        $this->destinataire = $destinataire; // Définit un nouveau destinataire
    }

    // Méthode pour afficher une annonce
    public function afficherAnnonce() {
        echo "ID: ".$this->id."<br>";
        echo "Description: ".$this->description."<br>";
        echo "Date: ".$this->date."<br>";
        echo "Auteur: ".$this->auteur."<br>";
        echo "Destinataire: ".$this->destinataire."<br>"; // Affiche le destinataire
    }
}
?>
