<?php

function get_conversation($id){
    $pdo = new PDO('mysql:host=localhost:3306;dbname=exercise', 'root', 'root');

    $st = $pdo->prepare("select id, user_name, body, date from conversations where id = :id");

    $st->bindValue(':id', $id);
    $st->execute();

    $conversation = $st->fetch();

    return $conversation;
}

session_start();

$mail = $_SESSION['mail'];

if (is_null($mail)) {
    header('location:/login.php');
}

$id = $_GET["id"];
$conversation = get_conversation($id);
if(is_null($conversation)){
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
  <h2>Chat Edit</h2>
  <form action="edit_controller.php" method="post">
    <input type="hidden" name="id" value="<?= $conversation['id']?>">
    <label>NAME : <?= htmlspecialchars($conversation['user_name']) ?></label><br>
    <label>BODY:</label><br>
    <textarea name="body" rows="10" cols="30"><?= $conversation['body']?></textarea><br>
    <input type="submit" name="name" value="edit">
  </form>
  <hr>
</body>
</html>