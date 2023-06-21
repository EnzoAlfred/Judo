<h2>Le profil de <?php echo $lAdherent['prenomA']; ?> <?php echo $lAdherent['nomA']; ?></h2>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Niveau</th>
                <th>E-mail</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center">
                <td class="case"><?php echo $lAdherent['prenomA']; ?></td>
                <td class="case"><?php echo $lAdherent['nomA']; ?></td>
                <td class="case"><?php echo $lAdherent['niveau']; ?></td>
                <td class="case"><?php echo $lAdherent['mail']; ?></td>
                <td>
                <form method="POST" action="index.php?controleur=admin&action=verifPourSupprAdherent">
                    <input type="hidden" value="<?php echo $lAdherent['idA']; ?>" name="idA" />
                    <button type="submit">Supprimer cet Adherent</button>
                </form>
                </td>
            </tr>
        </tbody>
    </table><br/>
</div>