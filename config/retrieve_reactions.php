<?php
require 'connet.php';

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $stmt = $conn->prepare("
        SELECT 
            SUM(reaction_type = 'like') AS likes, 
            SUM(reaction_type = 'dislike') AS dislikes 
        FROM reactions 
        WHERE post_id = ?
    ");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    // Return JSON response
    echo json_encode([
        'likes' => $result['likes'] ?: 0,
        'dislikes' => $result['dislikes'] ?: 0
    ]);

    $stmt->close();
}


//SELECT SUM(reaction_type = 'like') AS likes, SUM(reaction_type = 'dislike') AS dislikes

$conn->close();


?>

