<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

// Insert share record
$conn->query("INSERT INTO shares (post_id, user_id) VALUES ($post_id, $user_id)");

// Update share count in posts table
$conn->query("UPDATE posts_message SET post_share = post_share + 1 WHERE post_id = $post_id");

// Fetch updated share count
$count_result = $conn->query("SELECT post_share FROM posts_message WHERE post_id = $post_id");
$count_row = $count_result->fetch_assoc();

// Return updated share count as JSON
echo json_encode(["post_share" => $count_row['post_share']]);

$conn->close();
}
