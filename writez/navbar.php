<?php
    session_start();
    if(isset($_SESSION['correoC'])){
        echo "<style>
            .hide{
                display: none;
            }
        </style>";
    }
    if(!isset($_SESSION['correoC'])){
        echo "<style>
            .cerrar{
                display: none;
            }
        </style>";
    }

?>

<html>
    <head>
        
        <script src="https://kit.fontawesome.com/075f7bd8d2.js" crossorigin="anonymous"></script>

        <script>
            function cerrar(){
                if(confirm("¿Seguro que quieres salir?")){
                    window.location.href="Funciones/close_session.php";
                }                
            }

        </script>

        <style type="text/css">
            *{
                padding: 0px;
                margin: 0px;
            }

            #barra{
                width: 99%;
                background-color: #F16529;
                height: 50px;
                margin: auto;
            }

            #normal{
                list-style-type: none;
                text-align: center;
            }

            li{
                display: inline-block;
                padding: 10px;
            }

            a{
                color: #000;
            }
        </style>
    </head>

    <body> 
        <header>
            <div id="barra">
                <ul id="normal" style="font-size: 20px; padding-top:2px; margin-top:8px;">
                    <li class="hide"><a href="ingreso.php"> <i class="fas fa-sign-in-alt">Login</i></a></li>
                    <li class="hide"><a href="registro.php"> <i class="fas fa-registered">Register</i></a></li>
                    <li class="cerrar"><a href="perfilUser.php"><i class="fas fa-user">Profile</i></a></li>
                    <li class="cerrar"><a href="javascript:void(0);" onclick="cerrar();"><i class="fas fa-times-circle">Log out</i></a></li>
                </ul>
            </div>
        </header>
    </body>
    
</html>


