<h2>Inscription</h2>
<div style="text-align: center; border: 3px solid #000000; margin-right: 35%; margin-left: 35%;border-radius: 10px;">
    
    <form method="POST" action="index.php?controleur=information&action=enregistrerAdherent">
        <p>Prénom : <input type="text" name="prenom" required minlength="2" maxlength="20" title="Votre prénom" placeholder="Veuiller saisir votre prénom"/></p><br/>
        <p>Nom : <input type="text" name="nom" required minlength="2" title="Votre nom" placeholder="Veuiller saisir votre nom"/></p><br/>
        <p>E-mail : <input type="email" name="mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="L'e-mail doit contenir un @" placeholder="Veuiller saisir votre mail"/></p><br/>
        <p>Mot de passe : <input type="password" name="mdp" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" placeholder="Votre mot de passe" title="Le mot de passe doit contenir un nombre, une lettre majuscule et minuscule et dois être minimum de 12 caractères"/></p><br/>
        <p>Niveau : <input id="niv" type="text" name="niveau" list="l1" placeholder="Choisir son niveau" title="Votre niveau est à choisir" required
               patern="[Dd]ébutant|[Ii]ntermédiaire|[Pp]ro"/></p><br/>
        <datalist id="l1">
            <option>Débutant(e)</option>
            <option>Intermédiaire</option>
            <option>Pro</option>
        </datalist>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        </form><br/>
</div><br/>