<?php

$to = $email; // Địa chỉ email người nhận

if (!isset($to)) {
  $to = 'example@gmail.com';
}

$subject = 'Lấy lại mật khẩu'; // Tiêu đề email

// Nội dung email
$message = '
<!DOCTYPE html>
<html>
<head>
  <title>Lấy lại mật khẩu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333333;
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      color: #666666;
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    .button {
      display: inline-block;
      background-color: #007bff;
      color: #ffffff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 4px;
    }

    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Lấy lại mật khẩu</h1>
    <p>Chào ' . $email . ',</p>
    <p>Dưới đây là mật khẩu của bạn:</p>
    <p><strong>Mật khẩu: </strong>' . $newPassword . '</p>
    <p>Vui lòng đăng nhập và đổi mật khẩu sau khi đăng nhập.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ quản trị</p>
  </div>
</body>
</html>
';

$headers = 'From: admin@menfashion.com' . "\r\n" .
  'Reply-To: admin@example.com' . "\r\n" .
  'Content-type: text/html; charset=UTF-8' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
} else {
  echo 'Có lỗi khi gửi email.';
}