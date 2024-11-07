<?php
class utilisateurManager{
    private $_db;
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function setDb(PDO $db){
        $this->_db=$db;
    }

    public function ajouterUtilisateur(Utilisateur $utilisateur){
        $req = $this->_db->prepare('INSERT INTO utilisateur(nom, prenom, age, statut, mdp) VALUES(:nom, :prenom, :age, :statut, :mdp)');
        $req->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'age' => $utilisateur->getAge(),
            'statut' => $utilisateur->getTitre(),
            'mdp' => $utilisateur->getMotDePasse() 
        ]);
    }
    
    public function supprimerUtilisateur($id){
        $req = $this->_db->prepare('DELETE FROM utilisateur WHERE id = :id');
        $req->execute(['id' => $id]);
    }
    public function modifierUtilisateur(Utilisateur $utilisateurManager){
    
        $req = $this->_db->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, age = :age, statut = :statut, mdp = :mdp WHERE id = :id');
        $req->execute([
            'id' => $utilisateurManager->getId(),
            'nom' => $utilisateurManager->getNom(),
            'prenom' => $utilisateurManager->getPrenom(),
            'age' => $utilisateurManager->getAge(),
            'statut' => $utilisateurManager->getTitre(),
            'mdp' => $utilisateurManager->getMotDePasse() 
        ]);
    }
    
    public function getUtilisateur($id){
        $req = $this->_db->prepare('SELECT * FROM utilisateur WHERE id = :id');
        $req->execute(['id' => $id]);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
    
        if ($donnees) {
            return new Utilisateur($donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['age'], $donnees['mdp']);
        }
        return null; // Ou un message d'erreur, selon ce que tu préfères.
    }
    

    public function afficherToutLesUtilisateurs(){
        $req = $this->_db->query('SELECT * FROM utilisateur');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            echo "ID : ".$donnees['id']."<br>";
            echo "Nom : ".$donnees['nom']."<br>";
            echo "Prénom : ".$donnees['prenom']."<br>";
            echo "Age : ".$donnees['age']."<br>";
            echo "Titre : ".$donnees['statut']."<br>";
            echo "Mot de passe : ".$donnees['mdp']."<br>";
            echo "<br>";
        }
    }

    public function validerUtilisateur($id, $mdp) {
        $req = $this->_db->prepare('SELECT * FROM utilisateur WHERE id = :id');
        $req->execute(['id' => $id]);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
    
        if ($donnees) {
            
            if (trim($donnees['statut']) === 'admin') {
                return new Admin($donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['age'], $donnees['mdp']);
            } else {
                return new utilisateurSimple($donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['age'], $donnees['mdp']);
            }
        }
    
        return false; 
    }
    
    
}

?>