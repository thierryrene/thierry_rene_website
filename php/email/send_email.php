<?php

$headers = "From: " . strip_tags($_POST['name']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";       
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message  = '<html><body>';
$message .= '<h1>Email de contato através do website.</h1>';
$message .= '<p>Um possível cliente encaminhou seus dados para contato e maiores informações.</p>';
$message .= '<table style="border: 2px solid #424242;" cellpadding="20">';
$message .= "<tr><td><strong>Nome:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
$message .= "<tr><td><strong>E-mail:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$message .= "<tr><td><strong>Mensagem:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
$message .= "</table>";
$message .= '</body></html>';

$to = 'td_matos@terra.com.br';

$subject = 'Contato através do website (thierryrenewebdev.com)';

mail($to, $subject, $message, $headers);

?>

<script>  
  alert('E-mail enviado com sucesso!.');
  window.location.href = "../../";
</script>

