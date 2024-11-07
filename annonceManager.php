<?php
class annonceManager{
    private $_db;
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function setDb(PDO $db){
        $this->_db=$db;
    }

    public function ajouterAnnonce (Annonce $annonce){
        $q = $this->_db->prepare('INSERT INTO annonce (description, date, auteur, destinataire) VALUES (:description, :date, :auteur, :destinataire)');
        $q->bindValue(':description', $annonce->getDescription());
        $q->bindValue(':date', $annonce->getDate());
        $q->bindValue(':auteur', $annonce->getAuteur());
        $q->bindValue(':destinataire', $annonce->getDestinataire());
        $q->execute();
    }
   public function supprimerAnnonce($id){
    $this->_db->exec('DELETE FROM annonce WHERE id = '.$id);

   }
    public function getAnnonce($id){
        $q = $this->_db->prepare('SELECT * FROM annonce WHERE id = :id');
        $q->bindValue(':id', $id);
        $q->execute();
    }
    public function modifierAnnonce(Annonce $annonce){
        $q = $this->_db->prepare('UPDATE annonce SET description = :description, date = :date, auteur = :auteur, destinataire = :destinataire WHERE id = :id');
        $q->bindValue(':id', $annonce->getId());
        $q->bindValue(':description', $annonce->getDescription());
        $q->bindValue(':date', $annonce->getDate());
        $q->bindValue(':auteur', $annonce->getAuteur());
        $q->bindValue(':destinataire', $annonce->getDestinataire());
        $q->execute();
    }

    public function afficherToutesLesAnnoncesPubliques() {
        $q = $this->_db->query('SELECT * FROM annonce WHERE destinataire!="prive"');
        $annonces = [];
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $annonce = new Annonce($donnees['id'], $donnees['description'], $donnees['date'], $donnees['auteur'], $donnees['destinataire']);
            $annonces[] = $annonce;
        }
        return $annonces;
    }
    public function afficherToutesLesAnnoncesprive() {
        $q = $this->_db->query('SELECT * FROM annonce WHERE destinataire="prive"');
        $annonces = [];
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $annonce = new Annonce($donnees['id'], $donnees['description'], $donnees['date'], $donnees['auteur'], $donnees['destinataire']);
            $annonces[] = $annonce;
        }
        return $annonces;
    }

    public function afficherToutesLesAnnonces() {
        $q = $this->_db->query('SELECT * FROM annonce');
        $annonces = [];
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $annonce = new Annonce($donnees['id'], $donnees['description'], $donnees['date'], $donnees['auteur'], $donnees['destinataire']);
            $annonces[] = $annonce;
        }
        return $annonces;
    }

   
}

?>