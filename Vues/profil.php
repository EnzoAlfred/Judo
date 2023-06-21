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
                    <?php echo "<a href='index.php?controleur=information&action=modificationAdherent'>"; ?>
                    <button type="button">Modifier mes informations</button>
                    <?php echo "</a>"; ?>
                </td>
                <td>
                    <?php echo "<a href='index.php?controleur=information&action=afficherLesParticipations'>"; ?>
                    <button type="button">Voir les participations</button>
                    <?php echo "</a>"; ?>
                </td>
            </tr>
        </tbody>
    </table><br/>
</div>
