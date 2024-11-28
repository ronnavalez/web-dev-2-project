<!-- 
    Nov 27 2024
    Ron Navalez
-->


<?php
session_start();
require 'connect.php';

$searchResults = [];

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Sanitize input

    // Search in multiple tables (e.g., reviews, pages, etc.)
    $stmt = $db->prepare("
        SELECT 'Review' AS type, title AS result, CONCAT('reviews.php#', id) AS url
        FROM reviews
        WHERE title LIKE :query OR review LIKE :query
        UNION
        SELECT 'Page' AS type, title AS result, url
        FROM pages
        WHERE title LIKE :query OR content LIKE :query
    ");
    $stmt->execute([':query' => "%$query%"]);
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
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
            <input type="text" name="query" required style="padding: 5px; width: 300px;">
            <button type="submit" style="padding: 9px;
                                         width: 70px;
                                         background-color: #ffc107;
                                         color: gray;">Search</button>
        </form>
    </header>

    <h1>Search Results for "<?= htmlspecialchars($query); ?>"</h1>

    <div class="search-results">
        <?php if (!empty($searchResults)): ?>
            <ul>
                <?php foreach ($searchResults as $result): ?>
                    <li> 
                        <u><a style="color: #ffc107;"href="<?= htmlspecialchars($result['url']); ?>"><?= htmlspecialchars($result['result']); ?></a></u>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No results found for "<?= htmlspecialchars($query); ?>".</p>
        <?php endif; ?>
    </div>

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
