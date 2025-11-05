<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $to = "info@stepwaytechnologies.com";
    $subject = "New Website Form Submission";
    
    // Get form data
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    $form_type = htmlspecialchars($_POST['form_type'] ?? 'Contact Form');
    
    // Build email content
    $email_content = "Form Type: $form_type\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n\n";
    
    // Additional fields for specific forms
    if (isset($_POST['services'])) {
        $services = implode(", ", (array)$_POST['services']);
        $email_content .= "Services: $services\n";
    }
    
    if (isset($_POST['budget'])) {
        $email_content .= "Budget: " . htmlspecialchars($_POST['budget']) . "\n";
    }
    
    // Headers
    $headers = "From: website@stepwaytechnologies.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        http_response_code(200);
        echo "Thank you! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong. Please try again.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>