<?php
include_once '../config.php';
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['name']) || !isset($data['email'])) {
    echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    exit;
}

$name = trim($data['name']);
$email = trim($data['email']);
$message = isset($data['message']) ? trim($data['message']) : '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Invalid email address']);
    exit;
}

$to = SITE_EMAIL;
$subject = "New Chatbot Inquiry - Stepway Technologies";
$email_message = "
New contact form submission from Stepway Technologies chatbot:

Name: $name
Email: $email
Message: $message

This message was sent from the chatbot on your website.
";

$headers = "From: chatbot@stepwaytechnologies.com\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $email_message, $headers)) {
    echo json_encode(['success' => true, 'message' => 'Thank you! We will contact you soon.']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to send message. Please try again.']);
}
?>