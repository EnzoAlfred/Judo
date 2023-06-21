<h2>Les horaires du dojo</h2>
<div><br/>
    <table class="table">
        <thead>
            <tr style="border: 3px solid #000000">
                <th>Jours</th>
                <th>Début</th>
                <th>Fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesHoraires as $unHoraire){ ?>
            <tr style="text-align: center;">
                <td class="case"><?php echo $unHoraire['jour']; ?></td>
                <td class="case"><?php echo $unHoraire['heureDeb']; ?></td>
                <td class="case"><?php echo $unHoraire['heureFin'];?></td>
                <td><a href="index.php?controleur=admin&action=verifPourSupprHoraire&horaire=<?php echo $unHoraire['idH'];?>"><button type="button">Supprimer cette horaire</button></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table><br/>
    <div align="center">
        <a href="index.php?controleur=admin&action=pageAddHoraire"><button type="button">Ajouter un horaire</button></a>
    </div><br/>
</div>
