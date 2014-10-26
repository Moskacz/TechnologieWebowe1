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

    $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
    $query = "SELECT * FROM secret";
    $result = mysqli_query($dbc, $query) or die('Error querying');

    $row = $result->fetch_assoc();

    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = $row['email'];
    $mail->Password = $row['password'];
    $mail->SMTPSecure = 'tls';
    $mail->From = $row['email'];
    $mail->FromName = 'Michal Moskala';
    $emailListName = $_POST['to_address'];
    $query = "SELECT email FROM mailing_lists WHERE mailing_list_name = '$emailListName'";
    $result = mysqli_query($dbc, $query) or die('Error querying');

    while ($row = $result->fetch_array()) {
        $address = $row['email'];
        $mail->addAddress($address);
    }

    mysqli_close($dbc);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message_body'];

    $attachment = $_FILES['attachment'];
    if ($attachment) {
        if ($_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        }
    }

    if(!$mail->send()) {
        echo "<h2> Message could not be sent. Error: $mail->ErrorInfo";
    } else {
        echo '<h2>Messages have been successfully sent</h2>';
    }

    ?>
    <br/>
    <button class="cloud-button" onclick="location.href='index.php'">Back</button>
</div>

</body>
</html>

