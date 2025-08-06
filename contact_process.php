<?php

$to = "spn8@spondonit.com";

$from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($_REQUEST['name']);
$csubject = htmlspecialchars($_REQUEST['subject']);
$number = htmlspecialchars($_REQUEST['number']);
$cmessage = htmlspecialchars($_REQUEST['message']);

$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "You have a message from your Bitmap Photography.";

$logo = 'img/logo.png';
$link = '#';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$body .= "</td></tr></thead><tbody>";
$body .= "<tr><td style='border:none;'><strong>Name:</strong> {$name}</td>";
$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Phone:</strong> {$number}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
$body .= "<tr><td colspan='2' style='border:none;'><p>{$cmessage}</p></td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

if (filter_var($from, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($cmessage)) {
    $send = mail($to, $subject, $body, $headers);
}

?>
