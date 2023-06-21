<h2>Les horaires du dojo</h2>
<div><br/>
    <table class="table">
        <thead class="th">
            <tr>
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
            </tr>
            <?php } ?>
        </tbody>
    </table><br/>
</div>
