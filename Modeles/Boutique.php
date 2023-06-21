<?php

class Boutique extends BdPdo{
    
    public function getLesProduits(){
        $req = "select * from Produit;";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);

	$tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
	return $tableauDesLignesResultat;
    }
    
    public function getLeProduit($id){
        $req = "select * from Produit where idP = ".$id.";";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);

	$tableauDesLignesResultat = $resultatDeLaRequete->fetch();
	return $tableauDesLignesResultat;
    }
    
    public function ajouterAcheter($idP,$idA){
        $req = "insert into `Acheter` (`idProduit`,`idAdherent`) values "
                . "(".$idP.",".$idA.");";
        
        $result = $this->getConnexion()->exec($req);
	return $result;
    }
    
    public function afficherAcheter($idA){
        $req = "select * from Acheter "
                . "inner join `Produit` on Produit.idP = Acheter.idProduit "
                . "where idAdherent = ".$idA.";";
                
                $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
	return $tableauDesLignesResultat;
    }
    
    public function supprimerAcheter($idP,$idA){
        $req = "DELETE from Acheter where idProduit = ".$idP." and idAdherent = ".$idA.";";
        
        $result = $this->getConnexion()->exec($req);
	return $result;
    }
    
    public function getSolde($idA){
        $req = "select sum(prixP) as solde from Acheter "
                . "inner join `Produit` on Produit.idP = Acheter.idProduit "
                . "where idAdherent = ".$idA.";";
                
                $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetch();
	return $tableauDesLignesResultat;
    }
    
    public function supprAllAcheter($id){
        $req = "delete from Acheter where idAdherent = ".$id.";";
        
        $result = $this->getConnexion()->exec($req);
	return $result;
    }
}

