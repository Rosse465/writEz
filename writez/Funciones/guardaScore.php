<?php
require "BDs.php";
session_start();

if(!isset($_SESSION['correoC'])){
    header("Location: ../index.php");
}


$con=conect();

$score=$_REQUEST['score'];
$id_alum=$_SESSION['idC'];

$comp="SELECT * FROM score
        WHERE id_alum=$id_alum";

    $x=$con->query($comp);

    while($row=$x->fetch_array()){
        $id=$row["id_alum"];
        $max_punt=$row["max_punt"];
    }

    var_dump($max_punt);
    
    if($score>$max_punt){
        $sql="UPDATE score
            SET max_punt='$score'
            WHERE id_alum=$id_alum";
        $res=$con->query($sql);
    }


 //var_dump($_SESSION);
//echo $score;


    header("Location: ../index.php");

?>
