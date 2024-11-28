<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->


<?php
session_start();
require_once 'connect.php';

$role = $_SESSION['role'] ?? 'guest'; // Defaults to 'guest' if not logged in
$user_id = $_SESSION['user_id'] ?? null;

// add review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
    if ($role === 'admin' || $role === 'user') {
        $title = $_POST['title'];
        $review = $_POST['review'];
        $image_path = null;

        // image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES['image']['name']);
            $target_path = "uploads/" . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                $image_path = $image_name;
            }
        }

        $stmt = $db->prepare("INSERT INTO reviews (title, review, image_path, user_id) VALUES (:title, :review, :image_path, :user_id)");
        $stmt->execute([':title' => $title, ':review' => $review, ':image_path' => $image_path, ':user_id' => $user_id]);
        header("Location: reviews.php");
        exit();
    }
}

// Edit review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    if (($role === 'admin') || ($role === 'user' && $_POST['user_id'] == $user_id)) {
        $review_id = $_POST['review_id'];
        $title = $_POST['title'];
        $review = $_POST['review'];
        $image_path = $_POST['current_image'];

        //  image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES['image']['name']);
            $target_path = "uploads/" . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                $image_path = $image_name; // Overwrite old image
            }
        }

        $stmt = $db->prepare("UPDATE reviews SET title = :title, review = :review, image_path = :image_path WHERE id = :review_id");
        $stmt->execute([':title' => $title, ':review' => $review, ':image_path' => $image_path, ':review_id' => $review_id]);
        header("Location: reviews.php");
        exit();
    }
}

//  Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    if ($role === 'admin' || ($role === 'user' && $_POST['user_id'] == $user_id)) {
        $review_id = $_POST['review_id'];
        $stmt = $db->prepare("DELETE FROM reviews WHERE id = :review_id");
        $stmt->execute([':review_id' => $review_id]);
        header("Location: reviews.php");
        exit();
    }
}


// Fetch All Reviews (Read)
// Fetch All Reviews (with username and timestamp)
$query = "
    SELECT reviews.*, users.username, reviews.created_at 
    FROM reviews
    JOIN users ON reviews.user_id = users.id
    ORDER BY reviews.created_at DESC
";
$reviews = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

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
        <form action="search.php" method="GET" style="display: inline;
                                                      padding: 0px">
            <input type="text" name="query" placeholder="Search links here.." required style="padding: 5px; width: 300px;">
            <button type="submit" style="padding: 9px;
                                         width: 70px;
                                         background-color: #ffc107;
                                         color: gray;">Search</button>
        </form>
        </form>
    </header>
    <h1>Reviews</h1>
    <div class="all-reviews">
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <h3><?= htmlspecialchars($review['title']); ?></h3>
                <p><?= htmlspecialchars($review['review']); ?></p>
                <?php if (!empty($review['image_path'])): ?>
                    <img src="uploads/<?= htmlspecialchars($review['image_path']); ?>" alt="Review Image" width="200">
                <?php endif; ?>
                <p style="color: lightgray;">by: <?= htmlspecialchars($review['username']); ?> on <?= htmlspecialchars($review['created_at']); ?></p>

                <?php if ($role === 'admin' || ($role === 'user' && $review['user_id'] == $user_id)): ?>
                    <a href="edit.php?review_id=<?= $review['id']; ?>">Edit</a> |
                    <a href="edit.php?action=delete&review_id=<?= $review['id']; ?>">Delete</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    

    <?php if ($role === 'admin' || $role === 'user'): ?>
        <h2 style="text-align: center;">Leave a Review</h2>
        <form action="reviews.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="create">
            <label for="title">Review Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="review">Your Review:</label>
            <textarea id="review" name="review" required></textarea>
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image">
            <button type="submit">Submit Review</button>
        </form>
        <form action="logout.php" method="POST">
            <button type="submit" style="background-color: red; color: white; padding: 10px; border: none; cursor: pointer;">Logout</button>
        </form>

    <?php else: ?>
        <p style="text-align: center;">You must <a style="color: yellow;" href="login.php">log in</a> to leave a review.</p>
        <p style="text-align: center;">Don't have an account? <a style="color: yellow;" href="register.php">Register here!</a></p>
    <?php endif; ?>
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
