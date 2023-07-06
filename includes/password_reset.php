<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  
  // Check if email exists in the database
  $db = new mysqli('localhost', 'username', 'password', 'database_name');
  $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows == 0) {
    echo 'email_not_found';
    exit();
  }
  
  // Generate a random password
  $new_password = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
  
  // Hash the password
  $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
  
  // Update the user's password in the database
  $stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
  $stmt->bind_param('ss', $hashed_password, $email);
  $stmt->execute();
  
  // Send the email
  $to = $email;
  $subject = 'Password Reset';
  $message = 'Your new password is: ' . $new_password;
  $headers = 'From: ev.jovaney.agda.com' . "\r\n" .
    'Reply-To: ev.jovaney.agda@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  
  if (mail($to, $subject, $message, $headers)) {
    echo 'password_reset';
  } else {
    echo 'email_error';
  }
}
?>