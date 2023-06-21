<?php
include ("Modeles/Information.php");
include ("Modeles/Admin.php");
$objInfo = new Information();
$objAdmin = new Admin();
if(!isset($_GET['action']))
    $action = 'presenter';
else
    $action = $_GET['action'];

switch ($action){
    case 'presenter':
    {
        include ("Vues/v_presenter.html");
        break;
    }
    case 'diffceint':
    {
        include ("Vues/v_differentes_ceintures.html");
        break;
    }
    case 'horaire':
    {
        $lesHoraires = $objInfo->horaireJudo();
        
        include ("Vues/consulterHoraire.php");
        break;
    }
    case 'inscription':
    {
        include ("Vues/v_inscription.php");
        break;
    }
    case 'enregistrerAdherent':
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $niv = $_POST['niveau'];
        
        $result = $objInfo->inscription($prenom,$nom,$niv,$mdp,$mail);
        
        if($result == 1){
            $message = "Vous êtes bien inscris vous pouvez désormais accèder à la boutique"
            . ", à votre profil et vous pourrez nous contacter";
            $idA = $objInfo->connexion($mail,$mdp);
            $_SESSION['judo']['numero'] = $idA['idA'];
            $want = "yes";
            $time = 4;
            $extra = "index.php?controleur=information&action=profil";
            include ("Vues/message.php");
        }else{
            $message = "On a pas réussi à vous inscrire";
            include ("Vues/message.php");
        }
	break;
    }
    case 'pConnexion':
    {
        include("Vues/connexion.php");
        break;
    }
    case 'connexion':
    {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        
        $verif = $objInfo->connexion($mail, $mdp);
        
        if($verif == null){
            $message = "Vous devez vous inscrire.";
            include ("Vues/message.php");
        }else{
            $lAdherent = $objInfo->getLAdherent($verif['idA']);
            $admin = $objAdmin->getAdmin($lAdherent['idA']);
            $panier = $objInfo->nbPanier($lAdherent['idA']);
            $contact = $objAdmin->getLesContacts();
            include("Vues/bouton_accueil.php");
        }
	      break;
    }
    case 'contact':
    {
        include("Vues/contact.php");
        break;
    }
    case 'demandeContact':
    {
	      $idC = $objInfo->maxId();
        $messC = $_POST['messC'];
        $lMessage = explode("'",$messC);
        $leMessage = "";
        foreach($lMessage as $unBout){
	          $leMessage = $leMessage.$unBout."\'";
        }

        $leMessage = substr($leMessage,0,-2);
	      if($idC['idC']==null){
            $resultat = $objInfo->demandeContact(1,$leMessage, $_SESSION['judo']['numero']);
        }else{
	          $resultat = $objInfo->demandeContact($idC['idC'],$leMessage, $_SESSION['judo']['numero']);
	      }
        if($resultat==1){
            $message = "La demande de contact a bien été prise en compte";
            $want = "yes";
            $extra = "index.php?controleur=information&action=contact";
            $time = 3;
            include ("Vues/message.php");
        }else{
            $message = "La demande de contact n'a pas pu être effectuée";
            include ("Vues/message.php");
        }
	      break;
    }
    case 'profil':
    {
        $lAdherent = $objInfo->getLAdherent($_SESSION['judo']['numero']);
        
        include("Vues/profil.php");
        break;
    }
    case 'modificationAdherent':
    {
        $lAdherent = $objInfo->getLAdherent($_SESSION['judo']['numero']);
        
        include("Vues/formModifAdherent.php");
        break;
    }
    case 'enregistrementModificationAdherent':
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $niv = $_POST['niveau'];
        
        $result = $objInfo->modifierAdherent($_SESSION['judo']['numero'],$prenom,$nom,$niv,$mail);
        
        if($result==1){
            $want = "yes";
            $time = 3;
            $extra = "index.php?controleur=information&action=profil";
            $message = "Les informations ont bien été modifié";
            include ("Vues/message.php");
        }else{
            $message = "Les modifications n'ont pas pu être mis en place";
            include ("Vues/message.php");
        }
	break;
    }
    case 'afficherLesParticipations':
    {
        $lesParticipations = $objInfo->afficherCesParticipation($_SESSION['judo']['numero']);
        
        if($lesParticipations != null){
            include("Vues/consulterCesParticipations.php");
        }else {
            $lesHoraires = $objInfo->horaireJudo();
            include ("Vues/inscriptionADesHoraires.php");
        }
        break;
    }
    case 'inscriptionADesHoraires':
    {
        $lesHoraires = $objInfo->horaireJudo();
        include ("Vues/inscriptionADesHoraires.php");
        break;
    }
    case 'pSupprimerParticipation':
    {
        $lesParticipations = $objInfo->afficherCesParticipation($_SESSION['judo']['numero']);
        
        if($lesParticipations != null){
            include("Vues/fromSupprimerParticipation.php");
        }else {
            $message = "Vous n'avez pas de participation";
            include("Vues/message.php");
        }
        break;
    }
    case 'supprimerParticipation':
    {
        $idHoraire = $_POST['horaire'];
        
        $result = $objInfo->supprimerParticipation($idHoraire, $_SESSION['judo']['numero']);
        
        if($result==1){
            $want = "yes";
            $time = 3;
            $extra = "index.php?controleur=information&action=afficherLesParticipations";
            $message = "La participation a bien été supprimer";
            include ("Vues/message.php");
        }else{
            $message = "Une erreur est survenu.";
            include ("Vues/message.php");
        }
        break;
    }
    case 'enregistrementPourParticipation':
    {
        $idHoraire = $_POST['horaire'];
        
        $result = $objInfo->ajoutParticipation($idHoraire, $_SESSION['judo']['numero']);
        
        if($result==1){
            $want = "yes";
            $time = 3;
            $extra = "index.php?controleur=information&action=afficherLesParticipations";
            $message = "La participation a bien été ajouter";
            include ("Vues/message.php");
        }else{
            $message = "Une erreur est survenu.";
            include ("Vues/message.php");
        }
	break;
    }
    case 'pDeconnexion':
    {
	include("Vues/deconnexion.php");
	break;
    }
    case 'deconnexion':
    {
	$_SESSION['judo']['numero'] = NULL;
	include("Vues/bouton_deco.php");
	break;
    }
    case 'calendar':
    {
        include("Vues/calendar.php");
        break;
    }
    case 'mdpOublie':
    {
        include("Vues/mdpOublie.php");
        break;
    }
    case 'mdpChange':
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $lAdherent = $objInfo->getAdherent($prenom,$nom, $mail);
        if($lAdherent == null){
            $want = "yes";
            $time = 3;
            $extra = "index.php?controleur=information&action=connexion";
            $message = "Vous n'êtes pas adhérent.";
            include ("Vues/message.php");
            break;
        }else{
            include("Vues/mdpChange.php");
            break;
        }
        
    }
    case 'mdpModifier':
    {
        $id = $_POST['idA'];
        $mdp = $_POST['mdp'];
        
        $resultat = $objInfo->modifMdp($mdp,$id);
        
        if($resultat == 1){
            $want = "yes";
            $time = 3;
            $extra = "index.php?controleur=information&action=pConnexion";
            $message = "Le mot de passe à bien été modifier";
            include ("Vues/message.php");
        }else{
            $message = "Une erreur est survenu.";
            include ("Vues/message.php");
        }
        break;
    }
}
