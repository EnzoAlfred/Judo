<h2>Les Articles disponibles</h2>
<div id="article">
    <?php foreach($lesArticles as $lArticle) { ?>
    <?php $cat = $objArt->getCategorieDArticle($lArticle['idAr']);?>
    <form method="POST" action="index.php?controleur=article&action=consulterUnArticle">
    <div style="border: 3px solid #000000;width: 200px;margin-left: 42%;text-align: center;border-radius: 10px;">
        <p><strong><?php echo $lArticle['titre']; ?></strong></p>
        <p><hr width ="150"></p>
        <p><?php foreach($cat as $laCat){ ?>
        <input type="submit" class="inputCat" formaction="index.php?controleur=article&action=consulterUneCat&categorie=<?php echo $laCat['libelle']; ?>" value="<?php echo $laCat['libelle']; ?>">
        <?php } ?></p>
        <p><hr width ="50"></p>
        <input type="hidden" name="idAr" value="<?php echo $lArticle['idAr']; ?>"/>
        <button type="submit">Consulter</button>
        <p></p>
    </div><br/>
    </form>
    <?php } ?>
</div>