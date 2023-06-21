<h2>Enregistrement à un créneau horaire</h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 30%; margin-left: 30%;">
    <form method="POST" action="index.php?controleur=information&action=enregistrementPourParticipation">
        <p>Les horaires disponibles :</p>
        <div>
        <select name="horaire">
            <?php foreach($lesHoraires as $unHoraire){ ?>
            <option value="<?php echo $unHoraire['idH']; ?>"><?php echo $unHoraire['jour']; ?>, <?php echo $unHoraire['heureDeb']; ?>-<?php echo $unHoraire['heureFin'];?></option>
            <?php } ?>
        </select>
        </div><br/>
        <div>
        <button type="submit">Ajouter</button>
        </div><br/>
    </form>
</div><br/>
