<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Wysyłanie maila</title>
</head>
<body>
<div class="form" id="mail_div">
    <h1>Wypełnij pola</h1>
    <form action="summary.html" method="post" enctype="text/plain">
        <input type="text" id="subject" name="subject" placeholder="Subject"/> <br/>

        <select name="to_address">
            <option disabled selected>Select mailing list</option>
            <option>First List</option>
            <option>Second List</option>
            <option>Third list</option>
        </select> <br/>

        <input type="text" id="cc" name="cc" placeholder="CC"> <br/>
        <input type="text" id="bcc" name="bcc" placeholder="BCC"> <br/>
        <textarea id="message" name="message" placeholder="Message"></textarea> <br/>
        <input type="submit" class="cloud-button" name="submit" value="Send mail"> <br/>
    </form>


    <?php

    ?>

</div>
</body>
</html>