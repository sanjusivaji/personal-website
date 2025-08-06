<?php
$to = "sanjusivaji@gmail.com";
$from = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$body = "<strong>Name:</strong> $name<br>";
$body .= "<strong>Email:</strong> $from<br>";
$body .= "<strong>Subject:</strong> $subject<br>";
$body .= "<strong>Message:</strong><br>$message";

if (mail($to, "Message from Contact Form", $body, $headers)) {
    echo "Message sent successfully!";
} else {
    echo "Failed to send message.";
}
?>


