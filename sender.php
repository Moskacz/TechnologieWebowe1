<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Summary</title>
</head>
<body>

<div class="form" id="summary_div">
    <h1>Summary</h1>
    <?php
    require 'vendor/autoload.php';

    $subject = $_POST['subject'];
    $deliveryAddress = 'moskala.michal@gmail.com';
    $cc = $_POST['cc'];
    $bcc = $_POST['bcc'];
    $message = 'test';

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'moskala.michal@gmail.com';
    $mail->Password = 'THEceLL123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->From = 'moskala.michal@gmail.com';
    $mail->FromName = 'Michal Moskala';
    $mail->addAddress($deliveryAddress);


    $mail->Subject = $subject;
    $mail->Body    = $message;

    if(!$mail->send()) {
        echo "<h2> Message could not be sent. Error: $mail->ErrorInfo";
    } else {
        echo '<h2>Messages have been successfully sent</h2>';
    }

    ?>
    <button class="cloud-button" onclick="location.href='index.php'">Back</button>
</div>

</body>
</html>

