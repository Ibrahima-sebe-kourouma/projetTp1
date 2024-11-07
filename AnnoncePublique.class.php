<?php 
class AnnoncePublique extends Annonce {
    public function __construct($id, $description, $date, $auteur) {
        parent::__construct($id, $description, $date, $auteur);
    }

    public function afficherAnnonce() {
        echo "<strong>Annonce Publique:</strong><br>";
        parent::afficherAnnonce();
    }
}
?>
