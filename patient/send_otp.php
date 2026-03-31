<?php


header('Content-Type: application/json');
$request = json_decode(file_get_contents('php://input'), true);
$email = $request['email'];

// Generate a 6-digit OTP
$otp = random_int(100000, 999999);

require '../phpmail/PHPMailerAutoload.php';
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'techwithit28@gmail.com';
    $mail->Password = 'glalqhruukyladld';
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port = 587;

    $mail->setFrom('techwithit28@gmail.com', 'Cell Oasis');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification OTP';
    $mail->Body = "Your OTP is <b>$otp</b>. Please use this to verify your email.";

    $mail->send();
    echo json_encode(['success' => true, 'otp' => (string)$otp]); // Send OTP back for validation
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
}
