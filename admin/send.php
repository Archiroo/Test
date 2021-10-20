<?php
// 1Cài đặt môi trường sử dụng phpmailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
// Chỉ đường dẫn phù hợp với phần Tổ chức thư mục của bạn
    include 'phpmailer/Exception.php';
    include 'phpmailer/PHPMailer.php';
    include 'phpmailer/SMTP.php';

function sendEmail($recipient, $code)
{
  $mail = new PHPMailer(true); // Biến $mail là một object

  try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // gửi mail SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'tailieuit.nb@gmail.com'; // SMTP username
    $mail->Password = 'ioxajybnqwccykwy'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('tailieuit.nb@gmail.com', 'Directory'); // Tiêu đề của gmail

    $mail->addReplyTo('tailieuit.nb@gmail.com', 'Phản hồi từ người lạ');
    $mail->addAddress($recipient); // biến email được truyền vào

    //Tiêu đề
    $mail->isHTML(true);   // Set email format to HTML

    // Tiêu đề email là gì
    $mail->Subject = 'Mã xác thực tài khoản'; // tiêu đề trên email

    $mail->Body = 'Đây là một thông báo về xác thực tài khoảng gmail của bạn';
    $mail->Body = 'Nhấp vào đây để kích hoạt:
     <a href="http://localhost/directory/admin/activation.php?email='.$recipient.'&code='.$code.'">Nhấp vào đây</a>';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->addAttachment('pdf/Giay_bao_mat_sau.pdf');
    $mail->send();
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
