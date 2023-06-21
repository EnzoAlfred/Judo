<?php

class Information extends BdPdo{
    
    public function horaireJudo(){
        $req = "Select * From Horaire;";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);

	$tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
	return $tableauDesLignesResultat;
    }

    public function maxId(){
	$req = "select MAX(idC)+1 as idC from Contact;";

	$result = $this->getConnexion()->query($req);

	$lignederesult = $result->fetch();
	return $lignederesult;
    }
    
    public function demandeContact($idC,$message,$lAdherent){
	$req = "insert into `Contact` (idC,messC,idAdherent) values"
		."(".$idC.",'".$message."',".$lAdherent.");";

        $result = $this->getConnexion()->exec($req);
	return $result;
    }
    
    private function maxIdA(){
        $req = "select MAX(idA)+1 as idA from Adherent;";
        
        $result = $this->getConnexion()->query($req);

	$lignederesult = $result->fetch();
	return $lignederesult;
        
    }
    
    public function inscription($prenom,$nom,$niveau,$mdp,$mail){
    
        $idA = $this->maxIdA();
        $req = "insert into `Adherent` (`idA`,`prenomA`,`nomA`,`niveau`,`mdp`,`mail`,`role`) values "
                . "(".$idA['idA'].",'".$prenom."','".$nom."','".$niveau."',MD5('".$mdp."'),'".$mail."','Adherent');";
        
        $result = $this->getConnexion()->exec($req);
	return $result;
    }
    
    public function getIdAdherent($prenom,$nom,$niveau,$mdp,$mail) {
        $req = "select idA from Adherent where prenomA = '".$prenom."' and nomA = '".$nom."' and niveau = '".$niveau."' and mdp = MD5('".$mdp."') and mail = '".$mail."';";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetch();
	return $tableauDesLignesResultat;
    }
    
    public function connexion($mail,$mdp){
        $req = "select idA from Adherent where mail = '".$mail."' and mdp = MD5('".$mdp."');";
        
        
            $resultatDeLaRequete = $this->getConnexion()->query($req);
        
            $tableauDesLignesResultat = $resultatDeLaRequete->fetch();
            return $tableauDesLignesResultat;
    }
    
    public function getLAdherent($id){
        $req = "select * from Adherent where idA = ".$id.";";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetch();
        return $tableauDesLignesResultat;
    }
    
    public function modifierAdherent($id,$prenom,$nom,$niveau,$mail){
        $req = "update Adherent set prenomA = '".$prenom."', nomA = '".$nom."', niveau = '".$niveau."', mail = '".$mail."' where idA = ".$id.";";
        
        $result = $this->getConnexion()->exec($req);
	return $result;
    }
    
    public function afficherCesParticipation($id){
        $req = "select * from Participe "
                . "inner join `Horaire` on Horaire.idH = Participe.idHoraire where idAdherent = ".$id.";";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
        return $tableauDesLignesResultat;
    }
    
    public function ajoutParticipation($idH, $idA) {
        $req = "insert into `Participe` (`idHoraire`,`idAdherent`) values "
                . "(".$idH.",".$idA.");";
        
        $result = $this->getConnexion()->exec($req);
	return $result;
    }
    
    public function supprimerParticipation($idH,$idA) {
        $req = "delete from `Participe` where idHoraire = ".$idH." and idAdherent =".$idA.";";
        
        $result = $this->getConnexion()->exec($req);
	      return $result;
    }
    
    public function nbPanier($idA){
        $req = "Select count(idProduit) as nbP from Acheter where idAdherent = ".$idA.";";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetch();
        return $tableauDesLignesResultat;
    }
    
    public function getAdherent($prenom, $nom, $mail){
        $req = "Select * from Adherent where prenomA = '".$prenom."' and nomA = '".$nom."' and mail = '".$mail."';";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);
        
        $tableauDesLignesResultat = $resultatDeLaRequete->fetch();
        return $tableauDesLignesResultat;
    }
    
    public function modifMdp($mdp,$id){
        $req = "update Adherent set mdp = MD5('".$mdp."') where idA = ".$id.";";
        
        $result = $this->getConnexion()->exec($req);
	      return $result;
    }
}