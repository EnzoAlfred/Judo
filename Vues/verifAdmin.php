<script type="text/javascript">
    function valider(){
        if(document.formSaisie.pwdAdmin.value == "JeSuisAdmin"){
            return true;
        }else{
            alert("Le mot de passe est incorrect");
            return false;
        }
    }
</script>
<br/>
<div style="text-align: center; border: 3px solid #000000; margin-right: 35%; margin-left: 35%;">
    <form method="POST" action="<?php echo $lien; ?>" name="formSaisie" onsubmit="return valider()">
        <p>Mot de passe Admin : <input type="password" name="pwdAdmin" id="pwdAdmin" required maxlength="11"/></p>
        <?php for($i=0;$i<count($info);$i++){$tab[$i]=$info[$i];} ?>
        <input type="hidden" name="info" value="<?php foreach($tab as $latab){echo $latab;echo"*";} ?>" />
        <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        </div><br/>
    </form>
</div><br/>