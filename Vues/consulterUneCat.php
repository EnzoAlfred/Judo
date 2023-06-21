<h2>Les Articles de "<?php echo $cat; ?>"</h2>
<div>
    <?php foreach($lesArticles as $lArticle) { ?>
    <form method="POST" action="index.php?controleur=article&action=consulterUnArticle">
    <div style="border: 3px solid #000000;width: 200px;margin-left: 42%;text-align: center;border-radius: 10px;">
        <p><strong><?php echo $lArticle['titre']; ?></strong></p>
        <p><hr width ="150"></p>
        <input type="hidden" name="idAr" value="<?php echo $lArticle['idAr']; ?>"/>
        <button type="submit">Consulter</button>
        <p></p>
    </div><br/>
    </form>
    <?php } ?>
</div>