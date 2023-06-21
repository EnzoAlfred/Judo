<h2>Suppression d'une paricipation</h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 30%; margin-left: 30%;">
    <form method="POST" action="index.php?controleur=information&action=supprimerParticipation">
	<p>Les horaires disponibles :</p>
	<div>
        <select name="horaire">
            <?php foreach($lesParticipations as $laParticipation){ ?>
            <option value="<?php echo $laParticipation['idHoraire']; ?>"><?php echo $laParticipation['jour']; ?>, <?php echo $laParticipation['heureDeb']; ?>-<?php echo $laParticipation['heureFin'];?></option>
            <?php } ?>
        </select>
	</div><br/>
	<div>
        <button type="submit">Supprimer</button>
	</div><br/>
    </form>

</div><br/>
