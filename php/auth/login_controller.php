<?php

function login($mail, $password) {

    $pdo = new PDO('mysql:host=localhost:3306;dbname=exercise', 'root', 'root');
  
    $st = $pdo->prepare("select mail, password from users where mail = :mail and password = :password");
  
    $st->bindParam(':mail', $mail);
    $st->bindParam(':password', $password);
    $st->execute();
  
    $user = $st->fetch();
  
    if($user) {
      return true;
    }
    return false;
}

$mail = $_POST['mail'];
$password = $_POST['password'];

$result = login($mail, $password);

if ($result){
    session_start();
    $_SESSION['mail'] = $mail;
    header('location:/main.php');
  } else {
    header('location:/login.php');
  }