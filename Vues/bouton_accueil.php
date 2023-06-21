<?php
    if($admin['role'] == "Administrateur"){
        $_SESSION['judo']['numero'] = 0;
        $_SESSION['judo']['nbContact'] = count($contact);
    }else{
        $_SESSION['judo']['numero'] = $lAdherent['idA'];
        $_SESSION['judo']['panier'] = $panier['nbP'];
    }
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    if($_SESSION['judo']['numero'] != 0){
        $extra = 'index.php?controleur=information&action=profil';
        header("Location: http://$host$uri/$extra");
    }else{
        $extra = 'index.php?controleur=admin&action=gestionHoraire';
        header("Location: http://$host$uri/$extra");
    }

?>





