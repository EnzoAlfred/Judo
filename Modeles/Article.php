<?php

class Article extends BdPdo{
    
    public function getLesArticles(){
        $req = "select * from Article;";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);

      	$tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
      	return $tableauDesLignesResultat;
    }
    
    public function getLArticle($id){
        $req = "select * from Article where idAr = ".$id.";";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);

      	$tableauDesLignesResultat = $resultatDeLaRequete->fetch();
      	return $tableauDesLignesResultat;
    }
    
    public function getCategorie(){
        $req = "select * from Categorie;";
        
        $resultatDeLaRequete = $this->getConnexion()->query($req);

      	$tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
      	return $tableauDesLignesResultat;
    }
    
    public function getCategorieDArticle($id){
        $req = "select * from Appartenance inner join Article on Article.idAr = Appartenance.idArticle inner join Categorie on Categorie.idCat = Appartenance.idCategorie where idArticle = ".$id.";";

        $resultatDeLaRequete = $this->getConnexion()->query($req);

      	$tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
      	return $tableauDesLignesResultat;
    }
    
    public function getArticleAvecCategorie($libelle){
        $req = "select * from Appartenance inner join Article on Article.idAr = Appartenance.idArticle inner join Categorie on Categorie.idCat = Appartenance.idCategorie where libelle='".$libelle."';";

        $resultatDeLaRequete = $this->getConnexion()->query($req);

      	$tableauDesLignesResultat = $resultatDeLaRequete->fetchAll();
      	return $tableauDesLignesResultat;
    }
    
}