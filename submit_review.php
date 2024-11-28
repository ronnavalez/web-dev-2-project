<!-- 
    November 16, 2024
    Ron Navalez
-->

<?php
require 'connect.php';

$requiresAdmin = true; // This requires authentication
include 'authenticate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $review = $_POST['review'];
    $imagePath = null; // Default jsut in case no image is uploaded

    // Handle the file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $uploadDir . time() . "_" . $fileName;

        // Move the uploaded file to the uploads folder
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            $imagePath = $targetFilePath; // Save the file path to the database
        } else {
            echo "Error uploading the file.";
            exit;
        }
    }

    // Save the review to the database
    $sql = "INSERT INTO reviews (title, review, image_path, created_at) VALUES (:title, :review, :image_path, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':review' => $review,
        ':image_path' => $imagePath
    ]);

    echo "Review submitted successfully!";
    header('Location: reviews.php');
    exit;
}
?>
