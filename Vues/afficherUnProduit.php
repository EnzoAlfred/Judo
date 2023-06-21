<h2><?php echo $leProduit['nomP']; ?></h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 30%; margin-left: 30%;border-radius: 8px;box-shadow: 5px 5px 6px #000000;"><br/>
    <div>
        <img alt="<?php echo $leProduit['nomP']; ?>" src="<?php echo $leProduit['img'] ?>"/>
    </div >
    <p>Prix du produit : <?php echo $leProduit['prixP']; ?>€</p>
    <p>Description du produit : <?php echo $leProduit['descrP'] ?></p>
    <div>
    <p><a href="index.php?controleur=gestionBoutique&action=ajouterProduit&produit=<?php echo $leProduit['idP'] ?>"><button>Acheter le produit</button></a>
        <a href="javascript:history.go(-1)"><button>Retour</button></a></p>
        </div><br/>
</div><br/>

