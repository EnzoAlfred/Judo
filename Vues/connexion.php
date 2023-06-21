<h2>Connexion</h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 35%; margin-left: 35%;border-radius: 10px;">
    <form method="POST" action="index.php?controleur=information&action=connexion">
        <p>E-mail : <input type="email" name="mail" id="mail" required title="Votre e-mail" placeholder="Veuillez saisir votre e-mail"/></p>
        <p>Mot de passe : <input type="password" name="mdp" id="mdp" required title="Veuiller saisir votre mot de passe" placeholder="Votre mot de passe" /></p>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        <p><a href="index.php?controleur=information&action=mdpOublie" class="a">Mot de passe oublié ?</a></p>
    </form>
</div><br/>
<fieldset style="margin-right: 35%; margin-left: 35%;border-radius: 5px;">
<legend>Pas de compte ?</legend>
    <div align="center">
    <a href="index.php?controleur=information&action=inscription"><button>Inscription</button></a>
    </div>
</fieldset><br/>