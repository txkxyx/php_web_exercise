<?php

function get_user($mail){
    $pdo = new PDO('mysql:host=localhost:3306;dbname=exercise', 'root', 'root');

    $st = $pdo->prepare("select id, mail, name from users where mail = :mail");

    $st->bindValue(':mail', $mail);
    $st->execute();

    $user = $st->fetch();

    return $user;
}

session_start();

$mail = $_SESSION['mail'];

if (is_null($mail)) {
    header('location:/login.php');
}

$user = get_user($mail);
if(is_null($user)){
    header('location:main.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chat Application</title>
</head>
<body>
  <h1>Chat Application</h1>
  <hr>
  <h2>Chat Post</h2>
  <form action="post_controller.php" method="post">
    <input type="hidden" name="name" value="<?= $user['name']?>">
    <label>NAME : <?= htmlspecialchars($user['name']) ?></label><br>
    <label>BODY:</label><br>
    <textarea name="body" rows="10" cols="30"></textarea><br>
    <input type="submit" value="post">
  </form>
  <hr>
</body>
</html>