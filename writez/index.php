<?php
   include "navbar.php";
   if(isset($_SESSION['correoC'])){
        $nombreC=$_SESSION['nombreC'];
        $correoC=$_SESSION['correoC'];
        
   }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="jquery-3.3.1.min.js"></script>
    <script>

        function changePageEasy(){
            var pag= document.dificultad.nivel.value;
/*
            if(confirm("The timer will start once you click 'Accept'.")){
                window.location.href='act'+pag+'.php';
            }*/

            Swal.fire({
            title: 'The timer will start once you click Continue.',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continue',
            cancelButtonText: 'No',
            icon: 'info'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='act0.php'; 
            }
        })
            
        }

        function changePageHard(){

            Swal.fire({
                title: 'The timer will start once you click Continue.',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Continue',
                cancelButtonText: 'No',
                icon: 'info'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='act1.php'; 
                }
            })
            
        }

    </script>
    <title>writ-Ez</title>
</head>
<body>
    
    <h1 class="line-1 anim-typewriter"> Welcome to writ-Ez.</h1>
    
    <div class="instru"><b>Instructions:</b></div>
    <p class="text">Type the given quote in the box whithin the given time to score. <br> To play again, you can either refresh the page or reset the timer; your score will reset. <br> This is how the text will show if it is <b id="text-correct">correct</b> or <b id="text-inco">incorrect</b></p>

    <form name="dificultad" class="dif0i">
        <label style="font-size: 25px">Choose the level of difficulty:</label>
        <div class="botones">
            <input type="button" name="nivel" class="difi" onclick="changePageEasy();  return false;" value="Easy">
            <input type="button" name="nivel" class="difi" onclick="changePageHard();  return false;" value="Hard">
        </div>

    </form>
    <!--
    <input class="start" type="submit" value="Start!" onclick="changePage();  return false;">
    
        <button class="start" onclick="empezar()">Start!</button>
    -->
</body>
</html>