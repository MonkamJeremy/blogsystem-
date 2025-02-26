<?php
require "connet.php";


if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS total_comments FROM comments WHERE post_id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    echo json_encode(['total_comments' => $result['total_comments'] ?: 0]);

    $stmt->close();
}
$conn->close();
?>
