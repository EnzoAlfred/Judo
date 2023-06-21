<h2>Vous avez <?php echo count($lesProduits);?> produit(s) dans votre panier</h2>
<div>
    <?php foreach ($lesProduits as $unProduit) { ?>
    <div style="text-align: center; border: 3px solid #000000; margin-right: 30%; margin-left: 30%;border-radius: 8px;box-shadow: 5px 5px 6px #000000;">
        <br/><div>
            <img alt="<?php echo $unProduit['nomP']; ?>" src="<?php echo $unProduit['img'] ?>"/>
        </div>
        <p>Nom du produit : <?php echo $unProduit['nomP']; ?></p>
        <p>Prix du produit : <?php echo $unProduit['prixP']; ?>€</p>
	<div>
        <a href="index.php?controleur=gestionBoutique&action=afficherUnProduit&produit=<?php echo $unProduit['idP'] ?>"><button>Afficher le produit</button></a>
            <a href="index.php?controleur=gestionBoutique&action=supprimerAcheter&produit=<?php echo $unProduit['idP'] ?>"><button>Supprimer du panier</button></a>
	</div><br/>
    </div><br/>
    <?php } ?>
    <div>
	  <h2>Le solde est de <?php echo $solde['solde']; ?>€</h2>
    </div>
    <div align="center">
    <form action="index.php?controleur=gestionBoutique&action=payer" method="post">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_live_51NIpdDIDupQKvafEjg1fU61TaDloVHaq06f8MCyUYFxzgGorvfKd2UXYwRvPH1ijJuHcBHxoftqkYyK8d55IBE9Z00a9NF5Ux7"
        data-amount=<?php echo $price; ?>
        data-name="Judo"
        data-locale="auto"
        data-currency="eur"
        data-label="Acheter"></script>
        <input type="hidden" name="price" value=<?php echo $price; ?>>
    </form>
    </div>
</div>
