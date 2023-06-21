<?php
    if($want == "yes"){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    if(!isset($time)){
        header("Location: http://$host$uri/$extra");
    }else{
        header("refresh: $time;url = http://$host$uri/$extra");
    }
    }
    
?>

<div>
                    <div>
                        <p style="text-align: center"><?php echo $message; ?></p>
                        <p style="text-align: center"><?php echo $info[0];?> <?php echo $info[1];?> <?php echo $info[2];?> <?php echo $info[3];?> <?php echo $info[4];?> <?php echo $info[5];?> <?php echo $info[6];?> <?php echo $info[7];?> <?php echo $info[8];?> </p>
                    </div>

</div>
