<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <h1>Login Pengguna</h1>
    
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['message'])): ?>
        <p style="color:green;"><?php echo $_GET['message']; ?></p>
    <?php endif; ?>

    <form action="./views/login_process.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Masuk">
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body>
</html>
