<!doctype html>
<html>
<head>
    <meta charset="UTF-8" content="text/html">
    <title>PHP基礎</title>
</head>
<body>
<?php
try {


    $dns = 'mysql:dbname=phpkiso;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dns, $user, $password);
    $dbh->query('SET NAMES utf8');

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $goiken = $_POST['goiken'];

    $nickname = htmlspecialchars($nickname);
    $email = htmlspecialchars($email);
    $goiken = htmlspecialchars($goiken);

    echo $nickname;
    echo '様<br>';
    echo 'ご意見ありがとうございました<br>';
    echo 'いただいたご意見『';
    echo $goiken;
    echo '』<br>';
    echo $email;
    echo 'にメールを送りましたのでご確認ください。';

    $email_sub = 'アンケートを受け付けました';
    $email_body = $nickname . '様へ\nアンケートご協力ありがとうございました。';
    $email_head = 'From: kinpatucom821@gmail.com';
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    mb_send_mail($email, $email_sub, $email_body, $email_head);

    $sql = 'INSERT INTO anketo (nickname,email,goiken) VALUES ("' . $nickname . '","' . $email . '","' . $goiken . '")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
}
catch (Exception $e)
{
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
}
?>
</body>
</html>