<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Debugging: Output the environment variable
    $to = getenv('CONTACT_EMAIL');
    if ($to === false) {
        echo "Environment variable CONTACT_EMAIL is not set.";
        exit;
    }

    // Debugging: Output the $to variable
    echo "Email will be sent to: $to";

    $headers = "From: " . $email;
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>
