<?php
require "connet.php";
require_once 'controller_1.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$comment_text = $_POST['comment_text'];
$created_at = date("Y-m-d H:i:s");
global $conn;

$stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, comments_message,created_at) VALUES (?, ?, ?,?)");
$stmt->bind_param("iiss", $post_id, $user_id, $comment_text,$created_at);

if ($stmt->execute()) {
    echo "Comment saved successfully!";
    header("location:fullpost.php");
} else {
    echo "Error saving comment: " . $conn->error;
}

$stmt->close();
$conn->close();
}

/*$sql = "INSERT INTO comments(post_id,user_id,comments_message,created_at)
VALUES('$post_id','$user_id','$comment_message','$created_at')";

if(mysqli_query($conn,$sql)){
        
echo'comment sucessfully!';
}else{
echo'error posting comment';
}
}


$conn = mysqli_connect("localhost", "root", "", "blog_database"); // Replace with your database credentials


    $post_id = $_POST['post_id'];
    $user_name = $_POST['user_name'];
    $comment_text = $_POST['comment_text'];

    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_name, comment_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $post_id, $user_name, $comment_text);

    if ($stmt->execute()) {
        echo "Comment saved successfully!";
    } else {
        echo "Error saving comment: " . $conn->error;
    }

    $stmt->close();
    $conn->close();*/

?>

