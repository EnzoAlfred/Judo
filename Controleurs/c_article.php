<?php
include("Modeles/Article.php");
$objArt = new Article();
if(!isset($_GET['action']))
    $action = 'consulterArticle';
else
    $action = $_GET['action'];

switch($action){
    case 'consulterArticle':
    {
        $lesArticles = $objArt->getLesArticles();
        include("Vues/consulterArticle.php");
        break;
    }
    case 'consulterUnArticle':
    {
        $lArticle = $objArt->getLArticle($_POST['idAr']);
        include($lArticle['lArticle']);
        break;
    }
    case 'consulterUneCat':
    {
        $lesArticles = $objArt->getArticleAvecCategorie($_GET['categorie']);
        $cat = $_GET['categorie'];
        include("Vues/consulterUneCat.php");
        break;
    }
}