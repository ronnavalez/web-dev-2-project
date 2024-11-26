<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->


<?php

require 'connect.php';  // Include the database connection
require 'authenticate.php';

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the data from the form
    $title = htmlspecialchars($_POST['title']);

    $review = htmlspecialchars($_POST['review']);

    // Prepare and execute the query to insert the review into the database
    $stmt = $db->prepare("INSERT INTO reviews (title, review) VALUES (:title, :review)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':review', $review);

    if ($stmt->execute()) {
        echo '<script>alert("Review submitted successfully!")</script>';
    }
}

// Retrieve existing reviews from the database to display them
$stmt = $db->query("SELECT * FROM reviews ORDER BY created_at DESC");
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// display uploaded photos
$sql = "SELECT title, review, image_path, created_at FROM reviews ORDER BY created_at DESC";
$stmt = $db->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Reviews - Tri Builders Corp</title>
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
        </header>

<h1>Submit Your Review</h1>

<form action="submit_review.php" method="POST" enctype="multipart/form-data">
    <label for="title">Review Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="review">Your Review:</label>
    <textarea id="review" name="review" required></textarea>

    <label for="image">Upload an Image:</label>
    <input type="file" id="image" name="image" accept="image/*">

    <button type="submit">Submit Review</button>
</form>



<h2>All Reviews</h2>
<div class="reviews">
    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <h3><?= htmlspecialchars($review['title']) ?></h3>
            <p><?= nl2br(htmlspecialchars($review['review'])) ?></p>
            <?php if (!empty($review['image_path'])): ?>
                <img src="<?= htmlspecialchars($review['image_path']) ?>" alt="Review Image" style="max-width: 300px;">
            <?php endif; ?>
            <small><br>Posted on: <?= htmlspecialchars($review['created_at']) ?></small>
        </div>
        <hr>
    <?php endforeach; ?>
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


