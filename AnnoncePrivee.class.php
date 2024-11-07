<?php 
class AnnoncePrivee extends Annonce {

    public function __construct($id, $description, $date, $auteur, $destinataire) {
        parent::__construct($id, $description, $date, $auteur);
        $this->setDestinataire("prive");
    }

   

    public function afficherAnnonce() {
        echo "<strong>Annonce Privée:</strong><br>";
        parent::afficherAnnonce();
        echo "Destinataire: " . $this->getDestinataire() . "<br>";
    }
}
?>
