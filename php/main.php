<?php

function get_conversations(){
    $pdo = new PDO('mysql:host=localhost:3306;dbname=exercise', 'root', 'root');

    $st = $pdo->prepare("select id, user_name, body, date from conversations order by date desc");

    $st->execute();

    $conversations = $st->fetchAll();

    return $conversations;
}

session_start();

$mail = $_SESSION['mail'];

if (is_null($mail)) {
  header('location:/login.php');
}

$conversations = get_conversations()
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
  <h2>Chat List</h2>
  <ul>
  <?php foreach ($conversations as $conversation) { ?>
    <li>
      <a href="chat/edit.php?id=<?= $conversation['id']?>"><?= htmlspecialchars($conversation['body']) ?></a><?= htmlspecialchars('('.$conversation['user_name'].':'.$conversation['date'].')') ?>
    </li>
  <?php } ?>
  </ul>
  <hr>
</body>
</html>