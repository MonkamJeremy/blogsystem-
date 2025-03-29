<?php
require 'connet.php';
require_once 'functtions.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$post_id = $_GET['post_id'];

$comment_sql = "SELECT * FROM comments 
INNER JOIN user_account ON comments.user_id = user_account.user_id WHERE comments.post_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($comment_sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$comment_result = $stmt->get_result();

if($comment_result-> num_rows > 0){
while ($rows = $comment_result->fetch_assoc()) {
  echo "
  <div style ='display: flex;'>
  <div class='comm_div_userprofile_photo'>
  <a href='profile2.php?user_id=<?php echo $user_id ?>'>
     <img src ='uploaded_images/$rows[user_profilephoto]' alt ='user_profilephoto' class='comm_div_userprofile_photo'>
     </a>
  </div>
  <a href='profile2.php?user_id=<?php echo $user_id ?>'>
  <p style='padding-left:03px'>@$rows[user_name]</p><br>
  </a>
  </div>";
    
   echo"<p style='padding-left:13px; padding-top:05px;'>... $rows[comment_text]</p><br>";
  
}
}else{
  echo "...No comment found";
}




$stmt->close();

}

