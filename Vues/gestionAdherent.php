<h2>Ensemble des Adherents</h2>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>E-mail</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesAdherents as $lAdherent) { ?>
            <tr style="text-align: center">
                <td class="case"><?php echo $lAdherent['nomA']; ?></td>
                <td class="case"><?php echo $lAdherent['mail']; ?></td>
                <td>
                <form method="POST" action="index.php?controleur=admin&action=unAdherent">
                    <input type="hidden" value="<?php echo $lAdherent['idA']; ?>" name="idA" />
                    <button type="submit">Afficher cet Adherent</button>
                </form><br/>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table><br/>
</div>