<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/SOK/css/styles.css" />
</head>
<body>
    <div class="login-container">
        <form method="post" action="">
            <h2>Login</h2>
            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button class="login-button" type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="registration">Register here</a>.</p>
    </div>

</body>
</html>
