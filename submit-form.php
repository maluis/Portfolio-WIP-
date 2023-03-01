<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Get the form data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	// Validate the form data
	if (empty($name) || empty($email) || empty($subject) || empty($message)) {
		echo "Please fill out all fields.";
		exit;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Please enter a valid email address.";
		exit;
	}

	// Send the email
	$to = 'maluis@kean.edu'; 
	$headers = "From: $name <$email>" . "\r\n";
	if (mail($to, $subject, $message, $headers)) {
		echo "Thank you for contacting us.";
	} else {
		echo "There was a problem sending your message. Please try again.";
	}
} else {
	echo "Invalid request method.";
	exit;
}
?>