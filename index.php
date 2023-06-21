<?php
    session_start();

    require_once("Modeles/BdPdo.php");
    
    if (!isset($_SESSION['judo']['numero'])){
        include("Vues/v_layout_entete.php");
        
        if (!isset($_GET['controleur'])) {
            $controleur = 'accueil';
        } 
        else {
            $controleur = $_GET['controleur'];
        }
        
        switch ($controleur){
            case 'accueil':
            {
                include("Vues/accueil.html");
                break;
            }
            case 'information':
            {
                include ("Controleurs/c_information.php");
                break;
            }
            case 'article':
            {
                include("Controleurs/c_article.php");
                break;
            }
        }
    }else{
        
        if($_SESSION['judo']['numero'] != 0){
            include("Vues/v_layout_enteteA.php");
        
            if (!isset($_GET['controleur'])) {
                $controleur = 'accueil';
            } 
            else {
                $controleur = $_GET['controleur'];
            }
        
            switch ($controleur){
                case 'accueil':
                {
                    include("Vues/accueil.html");
                    break;
                }
                case 'information':
                {
                    include ("Controleurs/c_information.php");
                    break;
                }
                case 'gestionBoutique':
                {
                    include ("Controleurs/c_gestionBoutique.php");
                    break;
                }
                case 'article':
                {
                    include("Controleurs/c_article.php");
                    break;
                }
            }
            
        }else{
            
            include("Vues/v_layout_enteteAdmin.php");
        
            if (!isset($_GET['controleur'])) {
                $controleur = 'accueil';
            } 
            else {
                $controleur = $_GET['controleur'];
            }
        
            switch ($controleur){
                case 'accueil':
                {
                    include("Vues/accueil.html");
                    break;
                }
                case 'information':
                {
                    include ("Controleurs/c_information.php");
                    break;
                }
                case 'admin':
                {
                    include("Controleurs/c_admin.php");
                    break;
                }
            }
          }
        
    }
    
    include ("Vues/v_layout_pied.php");

