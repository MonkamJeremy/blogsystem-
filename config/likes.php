<?php
require 'connet.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 // Assume user is logged in
$post_id = $_GET['post_id'];
$user_id = $_GET['user_id'];

// Check if the user has already liked the post
$sql = "SELECT * FROM likes WHERE user_id = $user_id AND post_id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Unlike the post
    $conn->query("DELETE FROM likes WHERE user_id = $user_id AND post_id = $post_id");
    $count_result = $conn->query("SELECT post_likes FROM posts_message WHERE post_id = $post_id");
    $count_row = $count_result->fetch_assoc();

    echo json_encode(["post_likes" => $count_row['post_likes']]);
   // $conn->query("UPDATE posts_message SET post_likes = GREATEST(post_likes - 1, 0) WHERE post_id = $post_id");

    
} else {
    // Like the post
    $conn->query("INSERT INTO likes (user_id, post_id) VALUES ($user_id, $post_id)");
    $count_result = $conn->query("SELECT post_likes FROM posts_message WHERE post_id = $post_id");
    $count_row = $count_result->fetch_assoc();

    echo json_encode(["post_likes" => $count_row['post_likes']]);
    
   // $conn->query("UPDATE posts_message SET post_likes = post_likes + 1 WHERE id = $post_id");
    

    
}




$conn->close();
}
?>
