<?php
   if(isset($_SESSION['correoC'])){
        $nombreC=$_SESSION['nombreC'];
   }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    
    <script src="jquery-3.3.1.min.js"></script>
    <script>

        function empezar(){
            if(confirm("El contador empezará automaticamente una vez des 'Aceptar'.")){
                window.location.href="act.html";
            }
        }

        function changePage(){
            var pag= document.dificultad.nivel.value;

            if(confirm("El contador empezará automaticamente una vez des 'Aceptar'.")){
                window.location.href='act'+pag+'.html';
            }
            
        }

    </script>
    <title>writ-Ez - Login</title>
</head>
<body>

    <h1>Loguete</h1>
    
    <form name="dificultad" class="difi">
        <select name="nivel" id="nivel">
            <option value="0">Fácil</option>
            <option value="1">Difícil</option>
        </select>
    </form>

    <input class="start" type="submit" value="Start!" onclick="changePage();  return false;">
    <!--
        <button class="start" onclick="empezar()">Start!</button>
    -->
</body>
</html>