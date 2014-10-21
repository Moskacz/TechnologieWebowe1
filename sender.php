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

    $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
    $emailListName = $_POST['to_address'];
    $query = "SELECT email FROM mailing_lists WHERE mailing_list_name = '$emailListName'";
    $result = mysqli_query($dbc, $query) or die('Error querying');

    while ($row = $result->fetch_array()) {
        $address = $row['email'];
        $mail->addAddress($address);
    }

    mysqli_close($dbc);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['subject'];

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

