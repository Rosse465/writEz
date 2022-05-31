<?php
    
?>
<html>
    <head>
        <title>Log-in</title>
        <script src="jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/estilos-login.css">

        <script>

            function regresar(){
                $('#mensaje').html('');
            }

            function validarDatos(){
                var user= document.form.user.value;
                var pass= document.form.pass.value;

                if(user && pass){
                    $.ajax({
                    url: 'Funciones/validaCliente.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'user='+user+'&pass='+pass,
                    success: function(res){
                        
                        if(res==0){
                            $('#error').html('Username or password is incorrect.');
                            setTimeout("$('#error').html('');",3000);
                        }else{
                            window.location.href = 'index.php';
                        }
                    }, error: function(){
                        alert("Error, archivo no encontrado.");
                    }
                });
                
                
                }else{
                    $('#mensaje').html("There are blank fields.");
                    setTimeout("regresar()",3000);
                    
                }
            }

        </script>

    </head>

    <body>
    
        <h1 id="bienvenida"><u><i>Log onto your account!</i></u></h1>
        <a id="a" href="registro.php"><p class="link">Create an account</p></a>

        <fieldset style="margin-top: 100px;">
            <legend>Log-in</legend>
      

            <form name="form">

                <label>Username: </label>
                <input id="user" type="text" autocomplete="off" name="user"  placeholder="juan@gmail.com">
                <br>

                <label>Password: </label>
                <input id="pass" type="password" name="pass">
                <br>

                <input type="submit" id="boton" value="Enter" onclick="validarDatos();  return false;">
                
                <div id="mensaje"></div>
                <div id="error"></div>
            </form>
        </fieldset>

        <div class="footer">
            <a href="facebook.com" class="social"><i class="fab fa-facebook-square">Facebook</i></a>
            <a href="twitter.com" class="social"><i class="fab fa-twitter-square">Twitter</i></a>
            <p class="copy"><i class="fas fa-copyright" style="background-color: #ec4e5c; font-size: 18px"></i> Saúl Calan Sánchez</p>
        </div>

    </body>
    
</html>


