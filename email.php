<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    if (!isset($email)) {
        $email = $_SESSION['user_id'];
    }
    $productsHTML = "";
    foreach ($cart as $item) {
        $productsHTML = $productsHTML . '<li>' . $item['name'] . ' x ' . $item['quantity'] . ' x ' . $item['price'] . ' VND</li>';
        ;
    }
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'giabao20032001@gmail.com';
    $mail->Password = 'dixyilzwjtoekqoh';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('sender@example.com', 'Men Fashion Shop');
    $mail->addAddress($email, 'Recipient Name');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Order successfully';
    $mail->Body = '
  
  <html>
    <head>
        <title>Thông báo Đặt hàng thành công</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                color: #333333;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border: 1px solid #cccccc;
                border-radius: 5px;
            }
            h1 {
                color: #ff0000;
                font-size: 24px;
                margin-bottom: 20px;
            }
            p {
                margin-bottom: 10px;
            }
            .order-details {
                margin-top: 30px;
                padding-top: 20px;
                border-top: 1px solid #cccccc;
            }
            .order-details h2 {
                font-size: 18px;
                margin-bottom: 10px;
            }
            .order-details ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .order-details li {
                margin-bottom: 5px;
            }
            .thank-you {
                text-align: center;
                margin-top: 30px;
                font-size: 18px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Thông báo Đặt hàng thành công</h1>
            <p>Cảm ơn bạn đã đặt hàng từ Men Fashion. Dưới đây là chi tiết đơn hàng của bạn:</p>
            
            <div class="order-details">
                <h2>Thông tin đơn hàng</h2>
                <p><strong>Mã đơn hàng:</strong> ' . $order_id . '</p>
                ' .
        $productsHTML .
        '
                <hr/>
                <p><strong>Tổng giá: </strong>' . $total . ' VND </p>
                <p><strong>Giảm giá: </strong> ' . $promoPrice . ' VND </p>
                <p><strong>Phí giao hàng: </strong> 50000 VND </p>
                <p><strong>Tổng hoá đơn: </strong>' . $total - $promoPrice . ' VND </p>
            </div>
            <p class="thank-you">Hàng sẽ đến tay bạn trong 2 - 4 ngày tới!</p> 
            <p class="thank-you">Cảm ơn bạn đã mua hàng!</p>
        </div>
    </body>
    </html>
  
  ';

    // Send email
    $mail->send();
} catch (Exception $e) {
    echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
}
?>