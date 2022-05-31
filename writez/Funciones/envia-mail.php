<?php

    //codigo php para definir mi smtp con GMAIL

    require 'phpmailer/PHPMailerAutoload.php';

    $id=$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $correo=$_REQUEST['correo'];
    $score=$_REQUEST['score'];
    $correoProf=$_REQUEST['correoProf'];
    $res="";
    $emailSender='saul.calan@alumnos.udg.mx';
    $fecha=date("m.d.y");

    $mensaje="Hello, this is an automated email from Writ-Ez <br><br>Student's ID: ".$id."<br>Student's name: ".$nombre."<br>Student's email: ".$correo."<br>Student's score: ".$score;



    $mail= new PHPmailer;
    //enable following if is localhost
    $mail->isSMTP();

    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    //SENDER
    $mail->Username=$emailSender;
    $mail->Password='hansome.1';

    //RECIEVER
    $mail->setFrom($emailSender, 'Writ-Ez');
    $mail->addAddress($correoProf);
    //optional:
    $mail->addReplyTo($emailSender);

    $mail->isHTML(true);
    $mail->Subject=$nombre."'s score on Writ-Ez! as of ".$fecha;
    $mail->Body=$mensaje;

    if(!$mail->send()){
        $res= "Message not sent";
    }else{
        $res= "Message sent";
    }

    header("Location: ../index.php");

?>