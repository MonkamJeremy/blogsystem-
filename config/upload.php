<?php
require_once "connet.php";
require_once "controller_1.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$subject = $_POST['post_subject'];
$category = $_POST['post_category'];
$message = $_POST['post_message'];

$image = $_FILES['post_image'];
$image_name = $image['name'];
$image_type = $image['type'];
$image_tmp_name = $image['tmp_name'];
$image_error = $image['error'];
$image_size = $image['size'];

$current_time = date("Y-m-d H:i:s");
$user_id = $_SESSION['id'];

$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

// Validate MIME type
if (!in_array($image_type, $allowed_types)) {
echo "Invalid file type. Only JPG, PNG, and GIF are allowed.";
}

 // Extract file extension safely
 $ext = pathinfo($image_name, PATHINFO_EXTENSION);
 if (empty($ext)) {
     die("Error: Unable to detect file extension.");
 }
// Generate a unique file name
$new_image_name = uniqid(). '.' . $ext ;
$image_upload_path = "uploaded_images/$new_image_name";

move_uploaded_file($image_tmp_name, $image_upload_path);

//insert image path into db


$sql = "INSERT INTO posts_message (user_id, post_subject, post_img, post_category, post_message, post_created_at)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $user_id, $subject, $new_image_name, $category, $message, $current_time);

if ($stmt->execute()) {
echo 'Post uploaded successfully!';
} else {
echo "Error uploading post: {$stmt->error}";
}

$stmt->close();
$conn->close();

}

