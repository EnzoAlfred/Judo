<script type="text/javascript">
    function valider(){
        if(document.formSaisie.niv.value != "--Sélectionner un niveau--"){
            return true;
        }else{
            alert("Veuillez sélectionner un niveau");
            return false;
        }
    }
</script>
<h2>Modification des informations du profil de <?php echo $lAdherent['prenomA']?> <?php echo $lAdherent['nomA']?></h2>
<div style="text-align: center; border: 3px solid #000000;border-radius: 10px; margin-right: 35%; margin-left: 35%;">
    <form method="POST" action="index.php?controleur=information&action=enregistrementModificationAdherent" name="formSaisie" onsubmit="return valider()">
        <p>Prenom : 
        <input type="text" value="<?php echo $lAdherent['prenomA']?>" name="prenom"/></p><br/>
        <p>Nom : 
        <input type="text" value="<?php echo $lAdherent['nomA']?>" name="nom"/></p><br/>
        <p>E-mail : 
        <input type="email" value="<?php echo $lAdherent['mail']?>" name="mail"/></p><br/>
        <p>Niveau : 
        <select id="niv" name="niveau">
            <option>--Sélectionner un niveau--</option>
            <option>Débutant(e)</option>
            <option>Intermédiaire</option>
            <option>Pro</option>
        </select></p><br/>
        <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        </div><br/>
    </form>
</div><br/>