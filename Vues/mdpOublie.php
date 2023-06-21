<h2>Mot de passe oublié</h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 35%; margin-left: 35%;">
    <form method="POST" action="index.php?controleur=information&action=mdpChange">
        <p>Prénom : <input type="text" name="prenom" required minlength="2" maxlength="20" title="Saisir votre prénom" placeholder="Veuillez saisir votre prénom"/></p>
        <p>Nom : <input type="text" name="nom" required minlength="2" title="saisir votre nom" placeholder="Veuillez saisir votre nom"/></p>
        <p>E-mail : <input type="email" name="mail" required title="Saisir votre e-mail" placeholder="Veuillez saisir votre e-mail"/></p>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
    </form>
</div><br/>
