<?php
session_start();
    if(isset($_SESSION['nombreC'])){
        $nombreC=$_SESSION['nombreC'];
        /*
        echo "<script>
            alert('$nombreC');
        </script>";
        */
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos-act.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="dificil.js" defer></script>
    <script src="jquery-3.3.1.min.js"></script>

    <script>
           function changeBackground(color) {
            document.body.style.background = color;
        }

        function regresar(){
            var score=puntos.innerText;

            Swal.fire({
            title: 'Sure you want to finish?',
            text: "Final score: "+score,
            showCancelButton: true,
            confirmButtonColor: 'rgb(73, 216, 80)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            icon: 'warning'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'Funciones/ok.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'score='+score,
                    success: function(res){

                        if(res==1){
                            $('#error').html('Error.');
                            setTimeout("$('#error').html('');",3000);
                        }else{
                            document.form.method='post';
                            document.form.action='Funciones/guardaScore.php';
                            document.form.submit();
                        }
                    }, error: function(){
                        alert("Error, archivo no encontrado.");
                    }
                });
            }
        })

           /* if(confirm("Sure you want to finish?")){
                $.ajax({
                    url: 'Funciones/ok.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'score='+score,
                    success: function(res){

                        if(res==1){
                            $('#error').html('Error.');
                            setTimeout("$('#error').html('');",3000);
                        }else{
                            document.form.method='post';
                            document.form.action='Funciones/guardaScore.php';
                            document.form.submit();
                        }
                    }, error: function(){
                        alert("Error, archivo no encontrado.");
                    }
                });
            }
            */
        }
    </script>

    <title>writ-Ez</title>
</head>

<body oncopy="return false" onpaste="return false">

    <h1>Time to play!</h1>

    <div class="timer" id="time">0</div>
    <p style="font-size: 18px">Score: </p> <div class="puntaje" id="puntaje">0</div>
    
    <p>Type The Given Quote Within <b><u>25</u></b> seconds</p>

    <form name="form" class="form">
        <input type="hidden" name="forma" id="example" value="">
    </form>

    <div class="conte">
        <div class="texto" id="textoDisplay"></div>
        <textarea id="quoteInput" class="input" cols="30" rows="10" autofocus placeholder="Write here the text above"></textarea>
    </div>
    
    <div class="lado-izq">
        <p class="letras">You can change the colour and restart the timer</p>
        <br>
        <br>
        <label style="font-size: 25px;" for="fondo">Change background colour: </label><input type="color" name="fondo" id="fondo">
        <button onclick="changeBackground(fondo.value)" style="font-size: 20px;" class="letras">Change colour</button>

        <button onclick="startCountdown()" >Restart timer</button>
    </div>
    
    <div class="lado-der">
        <input class="terminar" type="submit" value="FINISH" onclick="regresar();  return false;">
    </div>
</body>
</html>