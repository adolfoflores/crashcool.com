<?php
// Formulario de contacto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit2'])) {
    $nick = trim(isset($_POST['nick']) ? $_POST['nick'] : '');
    $email = trim(isset($_POST['email']) ? $_POST['email'] : '');
    $mensaje = trim(isset($_POST['mensaje']) ? $_POST['mensaje'] : '');

    if ($nick == '' || $email == '' || $mensaje == '') {
        echo '<DIV ALIGN="CENTER"><FONT SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif" COLOR="#FF0000"><B>Debes rellenar los campos Nick, Email y Mensaje</B></FONT></DIV>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<DIV ALIGN="CENTER"><FONT SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif" COLOR="#FF0000"><B>El email no es v&aacute;lido</B></FONT></DIV>';
    } else {
        echo '<DIV ALIGN="CENTER"><FONT SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif" COLOR="#009900"><B>Mensaje enviado correctamente, gracias ' . cc_html($nick) . '</B></FONT></DIV>';
    }
}
