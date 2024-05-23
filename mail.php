<?php
$name = trim($_POST['contact-name']);
$phone = trim($_POST['contact-phone']);
$email = trim($_POST['contact-email']);
$message = trim($_POST['contact-message']);
if ($name == "") {
    $msg['err'] = "\n Debe indicar un nombre!";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} else if ($phone == "") {
    $msg['err'] = "\n Debe indicar un teléfono de contacto!";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} else if (!preg_match("/^[0-9 \\-\\+]{4,17}$/i", trim($phone))) {
    $msg['err'] = "\n Por favor, indique un teléfono válido!";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n Debe indicar una dirección de correo!";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Por favor, indique un correo válido!";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n Escriba su consulta!";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else {
    $to = 'nipabali@gmail.com';
    $subject = 'Doob Contact Query';
    $_message = '<html><head></head><body>';
    $_message .= '<p>Nombre: ' . $name . '</p>';
    $_message .= '<p>Teléfono: ' . $phone . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Mensaje: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:  Web SF <jobaro@gmail.com>' . "\r\n";
    $headers .= 'cc: ' . "\r\n";
    $headers .= 'bcc: ' . "\r\n";
    mail($to, $subject, $_message, $headers, '-f jobaro@gmail.com');

    $msg['success'] = "\n El correo ha sido enviado, pronto contactaré contigo";
    $msg['code'] = TRUE;
}
echo json_encode($msg);