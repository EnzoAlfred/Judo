<script type="text/javascript">
    function verif(){
        if(document.formSaisie.hD.value != document.formSaisie.hF.value){
            return true
        }else{
            alert("Les deux heures ne peuvent pas être identique");
            return false
        }
    }
</script>
<br/>
<div style="text-align: center;border-radius: 10px; border: 3px solid #000000; margin-right: 35%; margin-left: 35%;">
    <form method="POST" action="index.php?controleur=admin&action=verifPourAddHoraire" name="formSaisie" onsubmit="return verif();">
        <p>Jour : <input type="text" name="jour" list="l1" required placeholder="Veuillez mettre un jour" title="Un jour"
               patern="[Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi"/></p><br/>
        <datalist id="l1">
            <option>Lundi</option>
            <option>Mardi</option>
            <option>Mercredi</option>
            <option>Jeudi</option>
            <option>Vendredi</option>
            <option>Samedi</option>
        </datalist>
        <p>Heure début : <input type="time" name="heureDeb" id="hD" required value="00:00"/></p>
        <p>Heure fin : <input type="time" name="heureFin" id="hF" required value="00:00"/></p>
        <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        </div><br/>
    </form>
</div><br/>
