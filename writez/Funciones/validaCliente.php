<?php
    session_start();
    require "BDs.php";
    $con=conect();

    $user=$_REQUEST['user']; //correo
    $pass=$_REQUEST['pass'];
    $passEnc=md5($pass);


    $sql="SELECT * FROM usuarios 
           WHERE correo='$user' AND contrasena='$pass' AND status=0";
        
    $res=$con->query($sql);

    $num=$res->num_rows;
    if($num){
        $row=$res->fetch_array();
        $idC=$row["id"];

        $nombreC=$row["nombre"];
        $correoC=$row["correo"];
        $_SESSION['idC']=$idC;
        $_SESSION['nombreC']=$nombreC;
        $_SESSION['correoC']=$correoC;
        $_SESSION['scoreC'];
    }
/*
    $query="SELECT * FROM score 
           WHERE id_alum=$idC";
        
    $x=$con->query($query);

    $nume=$x->num_rows;
    if($nume){
        $row=$x->fetch_array();
        $idC=$row["id"];

        $nombreC=$row["nombre"];
        $correoC=$row["correo"];
        $_SESSION['idC']=$idC;
        $_SESSION['nombreC']=$nombreC;
        $_SESSION['correoC']=$correoC;
        $_SESSION['scoreC'];
    }
    */
    echo $num;

?>