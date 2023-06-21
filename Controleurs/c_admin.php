<?php
include ("Modeles/Admin.php");
$objAdmin = new Admin();
if(!isset($_GET['action']))
    $action = 'presenter';
else
    $action = $_GET['action'];

switch ($action){
    case "gestionHoraire":
    {
        $lesHoraires = $objAdmin->getLesHoraires();
        
        include("Vues/gestionHoraire.php");
        break;
    }
    case "pageAddHoraire":
    {
        include("Vues/formAddHoraire.php");
        break;
    }
    case "verifPourAddHoraire":
    {
        $info = array($_POST['jour'],$_POST['heureDeb'],$_POST['heureFin']);
        $lien = "index.php?controleur=admin&action=addHoraire";
        include("Vues/verifAdmin.php");
        break;
    }
    case "addHoraire":
    {            
            $info = explode("*", $_POST['info']);
        
            $resultat = $objAdmin->addHoraire($info[0],$info[1],$info[2]);
        
            if($resultat == 1){
                $lesHoraires = $objAdmin->getLesHoraires();
                include("Vues/gestionHoraire.php");
            }else{
                $message = "Une erreur est survenu.";
                include("Vues/message.php");
            }
        break;
    }
    case "verifPourSupprHoraire":
    {
        $info = $_GET['horaire'];
        $lien = "index.php?controleur=admin&action=supprHoraire";
        include("Vues/verifAdmin.php");
        break;
    }
    case "supprHoraire":
    {           
            $info = explode("*", $_POST['info']);
            
            $objAdmin->supprParticipeH($info[0]);
        
            $resultat = $objAdmin->supprUnHoraire($info[0]);
        
            if($resultat == 1){
                $lesHoraires = $objAdmin->getLesHoraires();
                include("Vues/gestionHoraire.php");
            }else{
                $message = "Une erreur est survenu.";
                include("Vues/message.php");
            }
        break;
    }
    case "gestionBoutique":
    {
        $lesProduits = $objAdmin->getLesProduits();
        include("Vues/gestionBoutique.php");
        break;
    }
    case "unProduit":
    {
        $leProduit = $objAdmin->getUnProduit($_GET['produit']);
        include("Vues/unProduit.php");
        break;
    }
    case "verifPourSupprProduit":
    {
        $info = $_GET['produit'];
        $lien = "index.php?controleur=admin&action=supprProduit";
        include("Vues/verifAdmin.php");
        break;
    }
    case "supprProduit":
    {           
            $info = explode("*", $_POST['info']);
            $lProduit = $objAdmin->getUnProduit($info[0]);
            unlink($lProduit['img']);
            $objAdmin->supprPanier($info[0]);
            
            $resultat = $objAdmin->supprUnProduit($info[0]);
        
            if($resultat == 1){
                $lesProduits = $objAdmin->getLesProduits();
                include("Vues/gestionBoutique.php");
            }else{
                $message = "Une erreur est survenu.";
                include("Vues/message.php");
            }
        break;
    }
    case "pageAddProduit":
    {
        include("Vues/formAddProduit.php");
        break;
    }
    case "verifPourAddProduit":
    {
        $img = file_get_contents($_FILES['img']['tmp_name']);
        $data = base64_encode($img);
        $name = $_FILES['img']['name'];
        $tabExtension = explode('.', $name);
        $extension = $tabExtension[1];
        $info = array($_POST['nomP'],$_POST['prixP'],$data,$_POST['descrP'],$extension);
        $lien = "index.php?controleur=admin&action=addProduit";
        include("Vues/verifAdmin.php");
        break;
    }
    case "addProduit":
    {           
            $info = explode("*", $_POST['info']);
            
            $name = md5(uniqid(rand(), true));
            
            $image_en_base64 = base64_decode($info[2]);

            $file = 'images/' . $name .".". $info[4]; 
                       
            file_put_contents($file, $image_en_base64);
            
            $lMessage = explode("'",$info[3]);
            $leMessage = "";
            foreach($lMessage as $unBout){
	              $leMessage = $leMessage.$unBout."\'";
            }

            $leMessage = substr($leMessage,0,-2);
            
            $resultat = $objAdmin->addProduit($info[0],$info[1],$name.".". $info[4],$leMessage);
        
            if($resultat == 1){
                $lesProduits = $objAdmin->getLesProduits();
                include("Vues/gestionBoutique.php");
            }else{
                $message = "Une erreur est survenu.";
                include("Vues/message.php");
            }
        break;
    }
    case "gestionAdherent":
    {
        $lesAdherents = $objAdmin->getLesAdherents();
        include("Vues/gestionAdherent.php");
        break;
    }
    case "verifPourSupprAdherent":
    {
        $info = $_POST['idA'];
        $lien = "index.php?controleur=admin&action=supprAdherent";
        include("Vues/verifAdmin.php");
        break;
    }
    case "supprAdherent":
    {            
            $info = explode("*", $_POST['info']);
            
            $panier = $objAdmin->getUnPanier($info[0]);
            
            if($panier != null){
                $result = $objAdmin->supprPanierAdherent($info[0]);
                
                if($res != 1){
                    $message = "impossible de supprimer le panier de l'adherent";
                    include("Vues/message.php");
                    break;
                }
            }
            
            $participe = $objAdmin->getParticipation($info[0]);
            
            if($participe != null){
                $res = $objAdmin->supprParticipe($info[0]);
                
                if($res == 1){
                    $message = "impossible de supprimer les participations de l'adherent";
                    include("Vues/message.php");
                    break;
                }
            }
            
            $resultat = $objAdmin->supprUnAdherent($info[0]);
        
                    if($resultat == 1){
                        $lesAdherents = $objAdmin->getLesAdherents();
                        include("Vues/gestionAdherent.php");
                    }else{
                        $message = "Impossible de supprimer l'adherent";
                        include("Vues/message.php");
                    }
        break;
    }
    case "unAdherent":
    {
        $lAdherent = $objAdmin->getUnAdherent($_POST['idA']);
        include("Vues/unAdherent.php");
        break;
    }
    case "gestionPanier":
    {
        $lesPaniers = $objAdmin->getLesPaniers();
        include("Vues/gestionPanier.php");
        break;
    }
    case "unPanier":
    {
        $panier = $objAdmin->getUnPanier($_POST['idA']);
        $lAdherent = $objAdmin->getUnAdherent($_POST['idA']);
        include("Vues/unPanier.php");
        break;
    }
    case "gestionContact":
    {
        $lesContacts = $objAdmin->getLesContacts();
        include("Vues/gestionContact.php");
        break;
    }
    case "verifPourSupprContact":
    {
        $info = $_POST['idC'];
        $lien = "index.php?controleur=admin&action=supprContact";
        include("Vues/verifAdmin.php");
        break;
    }
    case "supprContact":
    {           
            $info = explode("*", $_POST['info']);
        
            $resultat = $objAdmin->supprUnContact($info[0]);
        
            if($resultat == 1){
                $_SESSION['judo']['nbContact'] -= 1;
                $lesContacts = $objAdmin->getLesContacts();
                include("Vues/gestionContact.php");
            }else{
                $message = "Une erreur est survenu.";
                include("Vues/message.php");
            }
        break;
    }
    case "gestionParticipe":
    {
        $lesParticipations = $objAdmin->getLesParticipations();
        include("Vues/gestionParticipe.php");
        break;
    }
}
