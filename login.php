<!--checks for the word "error" in URL and starts the if statement.-->
<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Incorrect username or password.</p>
<?php endif; ?>


<!DOCTYPE html>
<html>
<head><title>HR Login</title></head>
<body>
  <h2>HR Manager Login</h2>
  <form method="POST" action="login_process.php">
    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>