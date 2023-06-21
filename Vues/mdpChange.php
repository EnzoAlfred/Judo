<script type="text/javascript">
    function valider(){
        if(document.formSaisie.mdp.value == document.formSaisie.mdp2.value){
            return true;
        }else{
            alert("Les deux mot de passe ne sont pas identique.");
            return false;
        }
    }
</script>

<h2>Mot de passe oublié</h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 35%; margin-left: 35%;">
    <form method="POST" action="index.php?controleur=information&action=mdpModifier" name="formSaisie" onsubmit="return valider()">
        <p>Mot de passe : <input type="password" name="mdp" id="mdp" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Le mot de passe doit contenir un nombre, une lettre majuscule et minuscule et dois être minimum de 12 caractères"/></p><br/>
        <p>Vérification mot de passe : <input type="password" name="mdp2" id="mdp2" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Même mot de passe que ci-dessus"/></p><br/>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        <input type="hidden" name="idA" value="<?php echo $lAdherent['idA']; ?>">
    </form>
</div><br/>
