<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chat Application</title>
</head>
<body>
  <h1>Chat Application</h1>
  <hr>
  <h2>Login</h2>
  <form action="auth/login_controller.php" method="post">
    <label>MAIL</label><br>
    <input type="email" name="mail"><br>
    <label>PASSWORD</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="login">
  </form>
</body>
</html>
