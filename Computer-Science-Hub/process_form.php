<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if form is submitted using POST method
  $name = $_POST['name']; // Get name from form
  $email = $_POST['email']; // Get email from form
  $message = $_POST['message']; // Get message from form
  
  $to = "mnnm1000nm2@gmail.com"; // Recipient email address
  $subject = "New Inquiry/Feedback from $name"; // Email subject
  $body = "Name: $name\nEmail: $email\nMessage:\n$message"; // Email body
  $headers = "From: $email"; // Email headers
  
  if (mail($to, $subject, $body, $headers)) { // Send email
    echo "Thank you for contacting us. We'll get back to you soon."; // Confirmation message
  } else {
    echo "Sorry, there was an error sending your message. Please try again later."; // Error message if email fails to send
  }
}
?>
