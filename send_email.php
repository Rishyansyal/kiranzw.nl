<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "info@kiranzw.nl"; // Vervang dit met je eigen e-mailadres
    $subject = "Nieuw bericht van je website";
    $body = "Naam: $name\nE-mail: $email\n\nBericht:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "E-mail succesvol verzonden!";
    } else {
        echo "Er is een fout opgetreden bij het verzenden van de e-mail.";
    }
} else {
    echo "Ongeldige aanvraag.";
}
?>