<!--
    November 25, 2024
    Ron Navalez
-->

<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // admin or user

        // Redirect to reviews.php
        header("Location: reviews.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Builders Corp - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="images/tbcheader.jpg" alt="Tri Builders Corp Logo"></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="reviews.php">Reviews</a></li>
            </ul>
        </nav>
        <div class="login-register">
            <a href="login.php">Login</a> | <a href="register.php">Register</a>
        </div>
        <form action="search.php" method="GET" style="display: inline;
                                                      padding: 0px">
            <input type="text" name="query" placeholder="Search links here.." required style="padding: 5px; width: 300px;">
            <button type="submit" style="padding: 9px;
                                         width: 70px;
                                         background-color: #ffc107;
                                         color: gray;">Search</button>
        </form>
    </header>
    <h1>Login</h1>
    
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button style="width: 50%; 
                       padding: 12px;
                       background-color: #007bff; 
                       color: white;
                       border: none;
                       font-size: 16px;
                       cursor: pointer;" 
                       type="submit">Login</button>
    </form>
    <p style="text-align: center;">Don't have an account? <a style="color: yellow;" href="register.php">Register here</a>.</p>
    <footer>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="reviews.php">Reviews</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a href="https://www.facebook.com/TriBuildersCorp/"><img src="images/facebook-icon.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/tribuilderscorp/"><img src="images/instagram-icon.png" alt="Instagram"></a>
        </div>

        <p>&copy; 2024 Tri Builders Corp. All rights reserved.</p>
    </footer>

</body>
</html>
</body>
</html>
