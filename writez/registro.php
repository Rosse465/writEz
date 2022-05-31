<?php
    
?>
<html>
    <head>
        <title>Registro</title>
        <script src="jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/estilos-login.css">

        <script>
            
            function regresar(){
                $('#mensaje').html('');
            }

            function validarDatos(){
                var nombre= document.form.nombre.value;
                var apellido= document.form.apellido.value;
                var user= document.form.user.value;
                var pass= document.form.pass.value;
                
                if(nombre && apellido && user && pass){
                    $.ajax({
                    url: 'Funciones/validarCorreo-cliente.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'user='+user,
                    success: function(res){
                        if(res==1){
                            $('#error').html('The email: '+user+ ', is already in use.');
                            setTimeout("$('#error').html('');",3000);
                        }else{
                            $('#finale').html('User created!');
                            setTimeout("$('#finale').html('');", 3500);
                            /*
                            const list = [1, 2, 3, 4]
                            const task = async () => {
                                for (const item of list) {
                                    await new Promise(r => setTimeout(r, 1000));
                                    console.log('.');
                                }
                            }
                            task();
                            */
                            document.form.method='post';
                            document.form.action='Funciones/salva-cliente.php';
                            document.form.submit();
                            
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

        <h1 id="bienvenida"><u><i>&nbspCreate an account!</i></u></h1>
        <div id="finale"></div>
        <fieldset class="registro" style="margin-top: 100px;">
           
            <form name="form">

            <label>Name: </label>
                <input id="nombre" type="text" autocomplete="off" name="nombre" placeholder="Fulanito">
                <br>
                
            <label>Last name: </label>
                <input id="apellido" type="text" autocomplete="off" name="apellido" placeholder="Pérez">
            <br>
            
            <label>Email: </label>
                <input id="user" type="text" autocomplete="off" name="user" placeholder="fulanito@perez.com">
                <br>

            <label>Password: </label>
                <input id="pass" type="password" name="pass" placeholder="Crea tu contraseña">
            <br>

                <input type="submit" id="boton" value="Create" onclick="validarDatos();  return false;">
                
                <div id="mensaje"></div>
                <div id="error"></div>
            </form>
        </fieldset>

        <div class="footer">
            <a href="facebook.com" class="social"><i class="fab fa-facebook-square">Facebook</i></a>
            <a href="twitter.com" class="social"><i class="fab fa-twitter-square">Twitter</i></a>
            <p class="copy"><i class="fas fa-copyright"></i> Saúl Calan Sánchez</p>
        </div>

    </body>
    
</html>


