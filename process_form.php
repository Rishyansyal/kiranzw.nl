<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $message = htmlspecialchars($data['message']);

    $to = "info@kiranzw.nl";
    $subject = "Nieuw bericht van $name";
    $body = "Naam: $name\nEmail: $email\n\nBericht:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Bericht succesvol verzonden!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Er is een fout opgetreden bij het verzenden van het bericht."]);
    }
}
?>
