<div>
    <table class="table">
        <thead>
            <tr>
                <th>Jour(s)</th>
                <th>Début</th>
                <th>Fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesParticipations as $laParticipation){ ?>
            <tr style="text-align: center">
                <td><?php echo $laParticipation['jour']; ?></td>
                <td><?php echo $laParticipation['heureDeb']; ?></td>
                <td><?php echo $laParticipation['heureFin'];?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div align="center">
    <a href="index.php?controleur=information&action=inscriptionADesHoraires"><button type="button">Ajouter une participation</button></a>
    <a href="index.php?controleur=information&action=pSupprimerParticipation"><button type="button">Supprimer une participation</button></a>
    </div><br/>
</div>
