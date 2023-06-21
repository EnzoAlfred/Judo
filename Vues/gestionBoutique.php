<h2>La boutique</h2>
<div>
    <?php foreach ($lesProduits as $unProduit) { ?>
    <div style="text-align: center; border: 3px solid #000000; margin-right: 30%; margin-left: 30%;border-radius: 8px;box-shadow: 5px 5px 6px #000000;">
        <br/><div>
            <a href="index.php?controleur=admin&action=unProduit&produit=<?php echo $unProduit['idP'] ?>"><img alt="<?php echo $unProduit['nomP']; ?>" src="<?php echo $unProduit['img']; ?>"/></a>
        </div>
        <p>Nom du produit : <?php echo $unProduit['nomP']; ?></p>
        <p>Prix du produit : <?php echo $unProduit['prixP'] ?>€</p>
        <div>
        <a href="index.php?controleur=admin&action=unProduit&produit=<?php echo $unProduit['idP'] ?>"><button>Afficher le produit</button></a>
        </div><br/>
    </div><br/>
    <?php } ?>
    <div align="center">
        <a href="index.php?controleur=admin&action=pageAddProduit"><button>Ajouter un Produit</button></a>
    </div><br/>
</div>
