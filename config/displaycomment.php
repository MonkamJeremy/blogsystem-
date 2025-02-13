<?php
require 'connet.php';
require_once 'controller_1.php'; 



$post_id = $_GET['post_id'];

$sql = "SELECT * FROM comments INNER JOIN posts_message ON comments.post_id = posts_message.post_id INNER JOIN user_account ON comments.user_id = user_account.user_id WHERE posts_message.post_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

if($result-> num_rows > 0){
while ($row = $result->fetch_assoc()) {
  echo "<head>
  <link rel='stylesheet' href='mainstyle.css'>
  </head>
  <div style ='display: flex;'>
  <div class='comm_div_userprofile_photo'>
     <img src ='uploaded_images/$row[user_profilephoto]' alt ='user_profilephoto' class='comm_div_userprofile_photo'>
  </div>
  <p style='padding-left:03px'>@$row[user_name]</p><br>
  </div>";
    
   echo"<p style='padding-left:13px; padding-top:05px;'>... $row[comments_message]</p><br>";
  
}
}else{
  echo "...No comment found";
}




$stmt->close();
$conn->close();

















/*

$post_id = $_POST['post_id'];
$sql = "SELECT * FROM comments INNER JOIN posts_message ON comments.post_id = posts_message.post_id INNER JOIN user_account ON comments.user_id = user_account.user_id WHERE posts_message.post_id = '$post_id' ORDER BY created_at DESC";

$result = mysqli_query($conn,$sql);

if($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
    echo "<head>
    <link rel='stylesheet' href='mainstyle.css'>
    </head>
    <div style ='display: flex;'>
    <div class='comm_div_userprofile_photo'>
       <img src ='uploaded_images/$row[user_profilephoto]' alt ='user_profilephoto' class='comm_div_userprofile_photo'>
    </div>
    <p style='padding-left:03px'>@$row[user_name]</p><br>
    </div>";
      
     echo"<p style='padding-left:13px; padding-top:05px;'>... $row[comments_message]</p><br>";
    }
}else{
  echo "...No comment found";
}
$conn->close();


$conn = mysqli_connect("localhost", "root", "", "blog_database"); // Replace with your database credentials
*/
?>