<?php
require "connet.php";
require_once 'controller_1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $reaction_type = $_POST['reaction_type'];
    $created_at = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO reactions(post_id,user_id,reaction_type,created_at) VALUES (?,?,?,?)");
    $stmt->bind_param("iiss", $post_id, $user_id, $reaction_type,$created_at);

    if ($stmt->execute()) {
        echo "Reaction saved successfully!";
    } else {
        echo "Error saving reaction: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

