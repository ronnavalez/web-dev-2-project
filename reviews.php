<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->

<?php
session_start();
require_once 'connect.php';

$role = $_SESSION['role'] ?? 'guest'; // Defaults to 'guest' if not logged in
$user_id = $_SESSION['user_id'] ?? null;

// Handle Create (Add Review)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
    if ($role === 'admin' || $role === 'user') {
        $title = $_POST['title'];
        $review = $_POST['review'];
        $image_url = null;

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES['image']['name']);
            $target_path = "uploads/" . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                $image_url = $image_name;
            }
        }

        $stmt = $db->prepare("INSERT INTO reviews (title, review, image_url, user_id) VALUES (:title, :review, :image_url, :user_id)");
        $stmt->execute([':title' => $title, ':review' => $review, ':image_url' => $image_url, ':user_id' => $user_id]);
        header("Location: reviews.php");
        exit();
    }
}

// Handle Update (Edit Review)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    if (($role === 'admin') || ($role === 'user' && $_POST['user_id'] == $user_id)) {
        $review_id = $_POST['review_id'];
        $title = $_POST['title'];
        $review = $_POST['review'];
        $image_url = $_POST['current_image'];

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES['image']['name']);
            $target_path = "uploads/" . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                $image_url = $image_name; // Overwrite old image
            }
        }

        $stmt = $db->prepare("UPDATE reviews SET title = :title, review = :review, image_url = :image_url WHERE id = :review_id");
        $stmt->execute([':title' => $title, ':review' => $review, ':image_url' => $image_url, ':review_id' => $review_id]);
        header("Location: reviews.php");
        exit();
    }
}

// Handle Delete
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
$reviews = $db->query("SELECT * FROM reviews ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Reviews</h1>
    <div class="all-reviews">
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <h3><?php echo htmlspecialchars($review['title']); ?></h3>
                <p><?php echo htmlspecialchars($review['review']); ?></p>
                <?php if (!empty($review['image_url'])): ?>
                    <img src="uploads/<?php echo htmlspecialchars($review['image_url']); ?>" alt="Review Image" width="200">
                <?php endif; ?>
                <p>By User ID: <?php echo htmlspecialchars($review['user_id']); ?></p>

                <?php if ($role === 'admin' || ($role === 'user' && $review['user_id'] == $user_id)): ?>
                    <form action="reviews.php" method="POST" style="display:inline;">
                        <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $review['user_id']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                    <form action="reviews.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $review['user_id']; ?>">
                        <input type="hidden" name="action" value="update">
                        <input type="text" name="title" value="<?php echo htmlspecialchars($review['title']); ?>" required>
                        <textarea name="review" required><?php echo htmlspecialchars($review['review']); ?></textarea>
                        <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($review['image_url']); ?>">
                        <input type="file" name="image">
                        <button type="submit">Update</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($role === 'admin' || $role === 'user'): ?>
        <h2>Leave a Review</h2>
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
    <?php else: ?>
        <p>You must log in to leave a review.</p>
    <?php endif; ?>
</body>
</html>
