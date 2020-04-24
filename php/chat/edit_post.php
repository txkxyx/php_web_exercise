<?php

function update_conversation($conversation){

    $pdo = new PDO('mysql:host=localhost:3306;dbname=exercise', 'root', 'root');
  
    $st = $pdo->prepare("update conversations set body = :body, date = now() where id = :id");
  
    $st->bindValue(':id', $conversation['id']);
    $st->bindValue(':body', $conversation['body']);
    $st->execute();
}

session_start();

$mail = $_SESSION['mail'];

if (is_null($mail)) {
    header('location:/login.php');
}

$id = $_POST['id'];
$body = $_POST['body'];

if (is_null($id) || is_null($body)) {
    header('location:/main.php');
}

$conversation = [];
$conversation['id'] = $id;
$conversation['body'] = $body;
update_conversation($conversation);
header('location:/main.php');
