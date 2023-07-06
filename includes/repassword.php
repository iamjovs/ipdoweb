<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vandorph/pmailer/phpmailer/src/Exception.php';
require 'vandorph/pmailer/phpmailer/src/PHPMailer.php';
require 'vandorph/pmailer/phpmailer/src/SMTP.php';


if(isset($_POST['remail'])){
    require_once "vendor/autoload.php";
   
    $email = $conn->real_escape_string($_POST['remail']);
    // Check if the email address exists in your database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Limit the number of password reset requests
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM password_resets WHERE email = ? AND created_at >= NOW() - INTERVAL 1 HOUR");
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        if ($count >= 3) {
            $response = array(
                'type' => 'error',
                'message' => 'Too many password reset requests, please try again later'
            );
            header('Content-Type: json');
            echo json_encode($response);
         
        }

        // Generate a random password reset token
        $token = bin2hex(random_bytes(32));

        // Store the token, email, created_at, and expired_at timestamps in the database
        $created_at = date('Y-m-d H:i:s');
        $expired_at = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token is valid for 1 hour
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, created_at, expired_at) VALUES (?, ?, ?, ?)");
        $stmt->execute([$email, $token, $created_at, $expired_at]);

        // Send an email to the user with a link to reset their password
        $mail = new PHPMailer(true);
 
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'essunoreply.ipdo@gmail.com';           // SMTP username
        $mail->Password   = '123ipdomain45';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('essunoreply.ipdo@gmail.com', 'IPDO Password Reset');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset your IPDO password';
        $mail->Body    = 'Hello,<br><br>We received a request to reset the password for your IPDO account. Click the link below to reset your password:<br><br><a href="https://example.com/reset_password.php?token=' . $token . '">Reset password</a><br><br>This link will expire at ' . $expired_at . '. If you did not request a password reset, you should ignore this email.<br><br>Best regards,<br>The IPDO Team';
        // Send the email
        try {
            $mail->send();
            $response = array(
                'type' => 'success',
                'message' => 'Password reset email has been sent to your email address'
            );
            header('Content-Type: json');
            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            $response = array(
                'type' => 'error',
                'message' => 'Password reset email could not be sent. Error message: ' . $mail->ErrorInfo
            );
            header('Content-Type: json');
            echo json_encode($response);
       
        }
    } else {
        $response = array(
            'type' => 'error',
            'message' => 'Email address not found'
        );
        header('Content-Type: json');
        echo json_encode($response);
       exit;
   }
}


?>
?>