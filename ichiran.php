<!doctype html>
<html>
<head>
    <meta charset="UTF-8" content="text/html">
    <title>PHP基礎</title>
</head>
<body>
<?
$dns = 'mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dns, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT * FROM anketo WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

while (1)
{
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }
    echo $rec['code'];
    echo $rec['nickname'];
    echo $rec['email'];
    echo $rec['goiken'];
    echo '<br>';
}

$dbh = null;
?>
<br>
<a href="menu.html">メニューに戻る</a>
</body>
</html>