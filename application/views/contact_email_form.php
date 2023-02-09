<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email Codeigniter</title>
</head>
<body>
    <?php
        echo $this->session->flashdata('email_sent');
        echo form_open('/Sendingemail_Controller/send_mail');
    ?>

    <input type="email" name="email" required />
    <input type="submit" value="SEND MAIL">
    <?php
        echo form_open();
    ?>
</body>
</html>