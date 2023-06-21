<?php 
class Admin extends BdPdo{

    public function getAdmin($id){
        $req = "Select role from Adherent where idA = ".$id.";";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    public function getLesHoraires(){
        $req = "Select * from Horaire;";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    private function maxIdHoraire(){
        $req = "select MAX(idH)+1 as idH from Horaire;";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    public function addHoraire($jour,$heureDeb,$heureFin){
        $idH = $this->maxIdHoraire();
        
        $req = "insert into Horaire (idH,jour,heureDeb,heureFin) values "
        ."(".$idH['idH'].",'".$jour."','".$heureDeb."','".$heureFin."');";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    public function supprUnHoraire($id){
        $req = "DELETE from Horaire where idH = ".$id.";";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    public function getLesAdherents(){
        $req = "Select * from Adherent where role = 'Adherent';";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    public function getUnAdherent($id){
        $req = "select * from Adherent where idA = ".$id.";";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    public function supprUnAdherent($id){
        $req = "DELETE from Adherent where idA = ".$id.";";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    
    public function getLesPaniers(){
        $req = "Select distinct idAdherent, nomA from Acheter inner join Adherent on Adherent.idA = Acheter.idAdherent inner join Produit on Produit.idP = Acheter.idProduit order by idAdherent;";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    public function getUnPanier($id){
        $req = "Select * from Acheter inner join Adherent on Adherent.idA = Acheter.idAdherent inner join Produit on Produit.idP = Acheter.idProduit where idAdherent = ".$id.";";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    public function getSoldeDunPanier($id){
        $req = "select sum(prixP) as solde from Acheter "
                . "inner join `Produit` on Produit.idP = Acheter.idProduit "
                . "where idAdherent = ".$id.";";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    public function getLesProduits(){
        $req = "Select * from Produit;";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    public function getUnProduit($id){
        $req = "Select * from Produit where idP = ".$id.";";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    private function maxIdProduit(){
        $req = "select MAX(idP)+1 as idP from Produit;";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    public function addProduit($nomP,$prixP,$img,$descrP){
        $idP = $this->maxIdProduit();
        
        $req = "insert into Produit (idP,nomP,prixP,img,descrP) values "
        ."(".$idP['idP'].",'".$nomP."',".$prixP.",'images/".$img."','".$descrP."')";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    public function supprUnProduit($id){
        $req = "DELETE from Produit where idP = ".$id.";";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    public function getLesParticipations(){
        $req = "select distinct jour, heureDeb, heureFin from Participe "
                . "inner join `Horaire` on Horaire.idH = Participe.idHoraire;";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    public function nbParticipation($jour){
        $req = "select count(distinct idAdherent) as nb from Participe inner join `Horaire` on Horaire.idH = Participe.idHoraire where jour = '".$jour."';";
        
        $resultat = $this->getConnexion()->query($req);
        
        $ligneResultat = $resultat->fetch();
        
        return $ligneResultat;
    }
    
    public function supprPanier($idP){
        $req = "delete from Acheter where idProduit = ".$idP.";";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    public function supprPanierAdherent($idA){
        $req = "delete from Acheter where idAdherent = ".$idA.";";
        
        $execution = $this->getConnexion()->exec($req);
        
        return $execution;
    }
    
    public function getParticipation($idA){
        $req = "select * from Participe where idAdherent = ".$idA.";";
        
        $lesResultats = $this->getConnexion()->query($req);
        
        $leTableauDesResultats = $lesResultats->fetchAll();
        
        return $leTableauDesResultats;
    }
    
    public function supprParticipe($idA){$req="delete from Participe where idAdherent = ".$idA.";";$execution = $this->getConnexion()->exec($req);return $execution;}
    public function getLesContacts(){$req="select * from Contact inner join Adherent on Adherent.idA = Contact.idAdherent;";$lesResultats = $this->getConnexion()->query($req);$leTableauDesResultats = $lesResultats->fetchAll();return $leTableauDesResultats;}
    public function supprUnContact($id){$req="delete from Contact where idC = ".$id.";";$execution = $this->getConnexion()->exec($req);return $execution;}
    public function supprParticipeH($idH){$req="delete from Participe where idHoraire = ".$idH.";";$execution = $this->getConnexion()->exec($req);return $execution;}
}