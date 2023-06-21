<?php
include("Modeles/Boutique.php");
$objBout = new Boutique();
if(!isset($_GET['action']))
    $action = 'consulterBoutique';
else
    $action = $_GET['action'];

switch ($action){
    case 'consulterBoutique':
    {
        $lesProduits = $objBout->getLesProduits();
        
        include("Vues/consulterBoutique.php");
        break;
    }
    case 'afficherUnProduit':
    {     
        $leProduit = $objBout->getLeProduit($_GET['produit']);
        include("Vues/afficherUnProduit.php");
        break;
    }
    case 'ajouterProduit':
    {        
        $result = $objBout->ajouterAcheter($_GET['produit'], $_SESSION['judo']['numero']);
        if($result==1){
            $_SESSION['judo']['panier'] += 1;
            $want = "yes";
            $extra = "index.php?controleur=gestionBoutique&action=consulterBoutique";
            include ("Vues/message.php");
        }else{
            $message = "On a pas pu le mettre dans votre panier.";
            include("Vues/message.php");
        }
        break;
    }
    case 'afficherAcheter':
    {
        $solde = $objBout->getSolde($_SESSION['judo']['numero']);
        
        $lesProduits = $objBout->afficherAcheter($_SESSION['judo']['numero']);
        
        if($lesProduits != null){
            require_once("configuration/config.php");
            $price = $solde['solde']*100;
            include("Vues/afficherPanier.php");
        }else{
            $message = "Vous n'avez pas de produit dans le panier";
            include("Vues/message.php");
        }
	      break;
    }
    case 'supprimerAcheter':
    {
        $idProduit = $_GET['produit'];
        
        $result = $objBout->supprimerAcheter($idProduit, $_SESSION['judo']['numero']);
        if($result==1){
            $_SESSION['judo']['panier'] -= 1;
            $want = "yes";
            $extra = "index.php?controleur=gestionBoutique&action=afficherAcheter";
            include ("Vues/message.php");
        }else{
            $message = "On a pas pu le supprimer de votre panier.";
            include("Vues/message.php");
        }
        break;
    }
    case 'payer':
    {
        require_once("configuration/config.php");
        $token  = $_POST['stripeToken'];
        $email  = $_POST['stripeEmail'];

        $customer = \Stripe\Customer::create([
            'email' => $email,
            'source'  => $token,
        ]);

        $charge = \Stripe\Charge::create([
            'customer' => $customer->id,
            'amount'   => $_POST['price'],
            'currency' => 'eur',
        ]);
        $resultat = $objBout->supprAllAcheter($_SESSION['judo']['numero']);
        $_SESSION['judo']['panier'] = 0;
        $want = "yes";
            $extra = "index.php?controleur=gestionBoutique&action=afficherAcheter";
            $time = 4;
            $message = "Le paiement a bien été effecté";
            include ("Vues/message.php");
        break;
    }
}
