<!-- 
    November 16, 2024
    Ron Navalez
-->

<?php
session_start();
require_once 'connect.php';

$role = $_SESSION['role'] ?? 'guest'; // Defaults to 'guest' if not logged in
$user_id = $_SESSION['user_id'] ?? null;

// Fetch the review to be edited
if (isset($_GET['review_id'])) {
    $review_id = $_GET['review_id'];
    $stmt = $db->prepare("SELECT * FROM reviews WHERE id = :review_id");
    $stmt->execute([':review_id' => $review_id]);
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$review) {
        die("Review not found.");
    }
} else {
    die("No review specified.");
}

// Only allow the user to edit their own review or admins
if ($role !== 'admin' && $review['user_id'] !== $user_id) {
    die("You don't have permission to edit this review.");
}

// Handle update request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $title = $_POST['title'];
    $review_text = $_POST['review'];
    $image_path = $_POST['current_image'];

    // Image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['image']['name']);
        $target_path = "uploads/" . $image_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image_path = $image_name; // Overwrite old image
        }
    }

    $stmt = $db->prepare("UPDATE reviews SET title = :title, review = :review, image_path = :image_path WHERE id = :review_id");
    $stmt->execute([':title' => $title, ':review' => $review_text, ':image_path' => $image_path, ':review_id' => $review_id]);
    header("Location: reviews.php");
    exit();
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $stmt = $db->prepare("DELETE FROM reviews WHERE id = :review_id");
    $stmt->execute([':review_id' => $review_id]);
    header("Location: reviews.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
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

    <h1>Edit Review</h1>
    <form action="edit.php?review_id=<?= $review['id']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="current_image" value="<?= htmlspecialchars($review['image_path']); ?>">
        
        <label for="title">Review Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($review['title']); ?>" required>
        
        <label for="review">Your Review:</label>
        <textarea id="review" name="review" required><?= htmlspecialchars($review['review']); ?></textarea>

        <label for="image">Upload New Image:</label>
        <input type="file" id="image" name="image">
        
        <button type="submit">Update Review</button>
    </form>

    <form action="edit.php?review_id=<?= $review['id']; ?>" method="POST" style="margin-top: 20px;">
        <input type="hidden" name="action" value="delete">
        <button type="submit" style="background-color: red; color: white;">Delete Review</button>
    </form>
    <form action="logout.php" method="POST">
        <button type="submit" style="background-color: red; color: white; padding: 10px; border: none; cursor: pointer;">Logout</button>
    </form>


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
