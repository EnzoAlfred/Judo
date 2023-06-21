<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script type="text/javascript" src="js/jquery-3.7.0.min.js"></script>

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
					<li><a href="index.php?controleur=admin&action=gestionHoraire">Gestion horaires</a></li>
                                        <li><a href="index.php?controleur=admin&action=gestionBoutique">Gestion boutique</a></li>
                                        <li><a href="index.php?controleur=admin&action=gestionAdherent">Tout les adherents</a></li>
                                        <li><a href="index.php?controleur=admin&action=gestionPanier">Tout les Paniers</a></li>
                                        <?php if($_SESSION['judo']['nbContact']==null) { ?>
                                        <li><a href="index.php?controleur=admin&action=gestionContact">Contact (0)</a></li>
                                        <?php }else{ ?>
                                        <li><a href="index.php?controleur=admin&action=gestionContact">Contacts (<?php echo $_SESSION['judo']['nbContact']; ?>)</a></li>
                                        <?php } ?>
                                        <li><a href="index.php?controleur=admin&action=gestionParticipe">Participation</a></li>
					<li><a href="index.php?controleur=information&action=pDeconnexion">Se déconnecter</a></li>
				</ul>
			</div>
		</div>
