<h2>Ensemble des Paniers</h2>
<div>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nombre de produit</th>
                <th>Solde du Panier</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesPaniers as $lePanier) { ?>
            <tr style="text-align: center">
                <td class="case"><?php echo $lePanier['nomA']; ?></td>
                <td class="case"><?php $nb = $objAdmin->getUnPanier($lePanier['idAdherent']); echo count($nb); ?></td>
                <td class="case"><?php $solde = $objAdmin->getSoldeDunPanier($lePanier['idAdherent']); echo $solde['solde']; ?></td>
                <td>
                <form method="POST" action="index.php?controleur=admin&action=unPanier">
                    <input type="hidden" value="<?php echo $lePanier['idAdherent']; ?>" name="idA" />
                    <button type="submit">Afficher plus de détail</button>
                </form><br/>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table><br/>
</div>
