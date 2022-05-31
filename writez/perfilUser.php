<?php 
    include "navbar.php"; require "Funciones/BDs.php";
    
    if(!isset($_SESSION['correoC'])){
               
        header("Location: index.php");
        session_destroy();
        die();
    }
    
?>

<html>
<head>
<script src="https://kit.fontawesome.com/075f7bd8d2.js" crossorigin="anonymous"></script>
    <title>Profile</title>
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos-act.css">
    
    <script>
        
        function regresar(){
            $('#mensaje').html('');
        }

        function validarDatos(){
            var id= document.forma01.id.value;
            var nombre= document.forma01.nombre.value;
            var correo= document.forma01.correo.value;
            var score= document.forma01.score.value;
            var correoProf= document.forma01.correoProf.value;

            if(id && nombre && correo && score && correoProf){
                document.forma01.method='post';
                document.forma01.action='Funciones/envia-mail.php';
                document.forma01.submit();
            }else{
                
                $('#mensaje').html("Faltan campos por llenar.");
                setTimeout("regresar()",3500); 
            }
        }

    </script>

</head>

<body style=" text-align: center">

    <a href="index.php" style="font-size: 20px; color: #fff; margin-top: 15px">Return to the main page</a>
    
    
    <table style="border: solid 1px; width: 50%; margin: auto; background-color:#E3FBFD; margin-top: 70px;">
        <tr style="height: 50px;">
            <td style="text-align: center; font-size: 30px; border: solid 1px">&nbspId&nbsp</td>
            <td style="text-align: center; font-size: 30px; border: solid 1px">Name</td>
            <td style="text-align: center; font-size: 30px; border: solid 1px">Email</td>
            <td style="text-align: center; font-size: 30px; border: solid 1px">Highscore</td>
        </tr>

        <i class="fa-solid fa-envelope"></i>

        <?php
            
            $correo=$_SESSION['correoC'];
            $a=$_SESSION['idC'];
            $con=conect();

            $sql="SELECT * FROM usuarios
                WHERE id=$a";

            $res=$con->query($sql);
            


            while($row=$res->fetch_array()){
                $id=$row["id"];
                $nombre=$row["nombre"];
                $correo=$row["correo"];
            }

            $codigo=$_SESSION['correoC'];
            $con=conect();

            $quety="SELECT * FROM score
                WHERE id_alum=$id";

            $punts=$con->query($quety);

            while($row=$punts->fetch_array()){
                $id_score=$row["id_score"];
                $id_alum=$row["id_alum"];
                $max_punt=$row["max_punt"];
            }
        
        echo "<tr>
            
            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$id_alum </td>
            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$nombre</td>

            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$correo</td>

            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$max_punt</td>
                        
            </td>

            </tr>
            <br>";
        
       ?>

            <br><br><br>
            
            
       <form name="forma01">
            <input type="hidden"  name="id" id="id" value="<?php echo $id_alum ?>"></div>
            <input type="hidden"  name="nombre" id="nombre" value="<?php echo $nombre ?>"></div>
            <input type="hidden"  name="correo" id="correo" value="<?php echo $correo ?>"></div>
            <input type="hidden"  name="score" id="score" value="<?php echo $max_punt ?>"></div>
            <label for="correoProf" class="text"><b>Enter your professor's email: </b></label>
            <input type="email" name="correoProf" id="correoProf" autocomplete="off" placeholder="fulanito@mail.com">

            <input id="boton" type="submit" value="Enviar" onclick="validarDatos();  return false;">
       </form>
       <div id="mensaje"></div>

    </table>
    </section>
</body>

</html>