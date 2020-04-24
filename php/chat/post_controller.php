<?php

function update_conversation($conversation){

    $pdo = new PDO('mysql:host=localhost:3306;dbname=exercise', 'root', 'root');
  
    $st = $pdo->prepare("insert into conversations(user_name, body, date)values(:name, :body, now())");
  
    $st->bindValue(':name', $conversation['name']);
    $st->bindValue(':body', $conversation['body']);
    $st->execute();
}

session_start();

$mail = $_SESSION['mail'];

if (is_null($mail)) {
    header('location:/login.php');
}

$name = $_POST['name'];
$body = $_POST['body'];

if (is_null($id) || is_null($body)) {
    header('location:/main.php');
}

$conversation = [];
$conversation['name'] = $name;
$conversation['body'] = $body;
update_conversation($conversation);
header('location:/main.php');
