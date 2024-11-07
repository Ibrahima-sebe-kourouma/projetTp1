<?php
class utilisateurSimple extends Utilisateur{
   //faire le constructeur mais en defoinissant une valeur pour l'attribut titre qui existe dans la classe mere
   public function __construct($id,$nom, $prenom, $age, $mdp) {
      parent::__construct($id, $nom, $prenom, $age, $mdp);
      $this->setTitre("Utilisateur_Simple") ;
   }

}
?>