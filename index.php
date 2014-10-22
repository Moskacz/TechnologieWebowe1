<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Wysyłanie maila</title>
</head>
<body>
<div class="form" id="mail_div">
    <h1>Fill fields</h1>
    <form action="sender.php" method="post" enctype="multipart/form-data">
        <input type="text" id="subject" name="subject" placeholder="Subject"/> <br/>

        <select name="to_address">
            <option disabled selected>Select mailing list</option>
        <?php
            $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
            $query = 'SELECT DISTINCT mailing_list_name FROM mailing_lists';
            $result = mysqli_query($dbc, $query) or die('error querying');
            while ($row = $result->fetch_array()) {
                $optionName = $row['mailing_list_name'];
                echo "<option>$optionName</option>";
            }
            mysqli_close($dbc);
        ?>
        </select><br/>

        <input type="text" id="cc" name="cc" placeholder="CC"> <br/>
        <input type="text" id="bcc" name="bcc" placeholder="BCC"> <br/>
        <textarea id="message_body" name="message_body" placeholder="Message"></textarea> <br/>
        <input type="file" id="attachment" name="attachment"> <br/>
        <input type="submit" class="cloud-button" name="submit" value="Send mail"> <br/>
    </form>
</div>
</body>
</html>
