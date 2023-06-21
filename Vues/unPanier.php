<h2>Le panier de <?php echo $lAdherent['prenomA']; ?> <?php echo $lAdherent['nomA']; ?></h2>
<div>
    <?php foreach ($panier as $unProduit) { ?>
    <div style="text-align: center; border: 3px solid #000000; margin-right: 30%; margin-left: 30%;border-radius: 8px;box-shadow: 5px 5px 6px #000000;">
        <br/><div>
            <img alt="<?php echo $unProduit['nomP']; ?>" src="<?php echo $unProduit['img'] ?>"/>
        </div>
        <p>Nom du produit : <?php echo $unProduit['nomP']; ?></p>
        <p>Prix du produit : <?php echo $unProduit['prixP']; ?>€</p>
    </div><br/>
    <?php } ?>
    <div align="center">
        <a href="javascript:history.go(-1)"><button>Retour</button></a>
    </div><br/>
</div>
