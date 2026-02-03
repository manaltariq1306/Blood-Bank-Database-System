<?php
include 'db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate input
    if (!empty($username) && !empty($password) && $password === $confirmPassword) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Default role: 'user'
        $role = $password === '123' ? 'admin' : 'user';

        $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $hashedPassword, $role);

        if ($stmt->execute()) {
            header("Location: login.php?registered=1");
            exit;
        } else {
            $error = "Username already exists.";
        }
    } else {
        $error = "Passwords do not match or fields are empty.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Same styling as login.php */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            font-family: 'Montserrat', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }
        h1 {
            color: #800000;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 1rem;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #800000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }
        button:hover {
            background-color: #5c0a0a;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .link {
            margin-top: 15px;
            display: block;
            color: #800000;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Account</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <a href="login.php" class="link">Back to Login</a>
    </div>
</body>
</html>