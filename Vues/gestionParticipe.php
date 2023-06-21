<h2>Ensemple des participations</h2>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>Jour(s)</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Nombre de participant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesParticipations as $laParticipation){ ?>
            <tr style="text-align: center">
                <td class="case"><?php echo $laParticipation['jour']; ?></td>
                <td class="case"><?php echo $laParticipation['heureDeb']; ?></td>
                <td class="case"><?php echo $laParticipation['heureFin'];?></td>
                <td class="case"><?php $nb = $objAdmin->nbParticipation($laParticipation['jour']); echo $nb['nb'];?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table><br/>
</div>
