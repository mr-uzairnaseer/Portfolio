<?php
header('Content-Type: application/json');

// Collect form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validate inputs
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
    exit;
}

// Process the form data (e.g., send email)
$to = "itsuzairnaseer@gmail.com"; // Replace with your email
$mailSubject = "New Contact Form Submission: $subject";
$mailBody = "Name: $name\nEmail: $email\nMessage:\n$message";

if (mail($to, $mailSubject, $mailBody)) {
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
}

