<?php
require 'connet.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   $post_id = $_GET['post_id'];
   $comment_id = $_GET['comment_id'];

  $delete_comment = $conn->query("DELETE FROM comments WHERE comment_id = $comment_id AND post_id = $post_id");
    
   if ($delete_comment) {
      // Update comment count
      $conn->query("UPDATE posts_message SET post_comments = post_comments - 1 WHERE post_id = $post_id");

      echo json_encode(["status" => "success"]);
  } else {
      echo json_encode(["status" => "error"]);
  }
}
