<?php
// primero detecto si me llega la informacion del formulario
if ($_POST) {
    // armo el mensaje
    $mensaje  = '<p>Nombre: ' . $_POST['nombre'] . '</p>';
    $mensaje .= '<p>E-mail: ' . $_POST['email'] . '</p>';
	$mensaje .= '<p>Asunto: ' . $_POST['asunto'] . '</p>';
    $mensaje .= '<p>Mensaje: '. str_replace("\n", '<br />', $_POST['mensaje']) .'</p>';

    // preparo los encabezados
    $send_to = "Ciberpsicología <ciberpsicologia.ar@gmail.com>";
    $encabezados  = "MIME-Version: 1.0\n";
    $encabezados .= "Content-type: text/html; charset=iso-8859-1\n";
    $encabezados .= "From: ".$_POST['nombre']."<".$_POST['email'].">\n";
    $encabezados .= "X-Sender: ".$_POST['email']."\n";
    $encabezados .= "X-Mailer: PHP\n";
    $encabezados .= "X-Priority: 3\n";

    // seteo el asunto del mensaje
    $asunto = 'Ciberpsicología: Nueva consulta en la web';

    // envio el mail con la funcion "send" de php
    $is_send = mail($send_to, $asunto, $mensaje, $encabezados);

    // muestro un mensaje al usuario
    if ($is_send) {
        echo 'El mensaje ha sido enviado con exito!';
    } else {
        echo 'No se pudo enviar el mensaje';
    }
} else {
    echo 'El formulario no fue enviado';
}
?>