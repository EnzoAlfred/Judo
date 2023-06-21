<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script type="text/javascript" src="js/jquery-3.7.0.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<title>Judo</title> 

<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="/images/favicon.png" rel="shortcut icon" type="image/png">
</head>
<body>

<div id="blocPage">
    <section>
		<div class="bordure">
			<h1 class="title" >Judo</h1>
			<div class="menu">
				<ul class="menu">
                                        <li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?controleur=information&action=presenter">Présentation</a></li>
					<li><a href="index.php?controleur=information&action=diffceint">Ceintures</a></li>
					<li><a href="index.php?controleur=information&action=horaire">Horaires</a></li>
                 <li><a href="index.php?controleur=article&action=consulterArticle">Les Articles</a></li>
                                        <li><a href="index.php?controleur=gestionBoutique&action=consulterBoutique">Boutique</a></li>
					<li><a href="index.php?controleur=information&action=contact">Nous contacter</a></li>
                                        <li><a href="index.php?controleur=information&action=profil">Profil</a></li>
                                        <?php  if($_SESSION['judo']['panier']==null || $_SESSION['judo']['panier'] <= 0){ ?>
                                        <li><a href="index.php?controleur=gestionBoutique&action=afficherAcheter">Panier (0)</a></li>
                                        <?php }else{ ?>
                                        <li><a href="index.php?controleur=gestionBoutique&action=afficherAcheter">Panier (<?php echo $_SESSION['judo']['panier']; ?>)</a></li>
                                        <?php }  ?>
					<li><a href="index.php?controleur=information&action=pDeconnexion">Se déconnecter</a></li>
				</ul>
			</div>
		</div>
