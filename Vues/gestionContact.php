<?php if($_SESSION['judo']['nbContact'] == 0 or $_SESSION['judo']['nbContact'] == null){ ?>
<div align="center">
    <p>Pas de contact pour le moment</p>
</div>
<?php }else{ ?>
<h2>Ensemble des contacts</h2>
<div>
    <table>
        <thead>
            <tr>
                <th>Nom de adherent</th>
                <th>Le message</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesContacts as $leContact) { ?>
            <tr style="text-align: center">
                <td class="case"><?php echo $leContact['nomA']; ?></td>
                <td class="case"><?php echo $leContact['messC']; ?></td>
                <td>
                <form method="POST" action="index.php?controleur=admin&action=verifPourSupprContact">
                    <input type="hidden" value="<?php echo $leContact['idC']; ?>" name="idC" />
                    <button type="submit">Supprimer le contact</button>
                </form><br/>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table><br/>
</div>
<?php } ?>