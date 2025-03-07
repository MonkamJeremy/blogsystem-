<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
      <form action="">
            <textarea name="" id="comment_text" placeholder="enter comment"></textarea>
           
            <button id="comment_btn">submit</button>
            <div id="comments"></div>
      </form>
      <?php

$image = $_FILES['post_image'];
$image_name = $image['name'];
$image_type = $image['type'];
$image_tmp_name = $image['tmp_name'];
$image_error = $image['error'];
$image_size = $image['size'];


$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

// Validate file upload success
if ($image_error !== UPLOAD_ERR_OK) {
    echo "Error uploading file. Error Code: $image_error";
}

// Validate MIME type
if (!in_array($image_type, $allowed_types)) {
echo "Invalid file type. Only JPG, PNG, and GIF are allowed.";
}

// Validate file size (e.g., limit to 2MB)
if ($image_size > 2 * 1024 * 1024) {
    echo "File size too large. Maximum 2MB allowed.";
}

//remove special characters from file name
$safe_name = preg_replace("/[^a-zA-Z0-9\._-]/", "", $image_name);

// Generate a unique file name
$new_image_name = uniqid().'.'. pathinfo($safe_name, PATHINFO_EXTENSION);
$upload_dir ='uploaded_images/';
$image_upload_path = "$upload_dir $new_image_name";


move_uploaded_file($image_tmp_name, $image_upload_path);




      $safe_name = "photo.jpg";  // Simulated file name
      $ext = pathinfo($safe_name, PATHINFO_EXTENSION);
      
      echo "File extension: " . $ext;
        


   
      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['post_image'])) {
          $image = $_FILES['post_image'];
          $image_name = $image['name'];
          $image_tmp_name = $image['tmp_name'];
          $image_error = $image['error'];
          $image_size = $image['size'];
      
          // Debugging - Print the uploaded file data
          echo "<pre>";
          print_r($_FILES);
          echo "</pre>";
      
          // Check for errors
          if ($image_error !== UPLOAD_ERR_OK) {
              die("Error uploading file. Error Code: $image_error");
          }
      
          // Extract file extension safely
          $ext = pathinfo($image_name, PATHINFO_EXTENSION);
          if (empty($ext)) {
              die("Error: Unable to detect file extension.");
          }
      
          // Validate file extension
          $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
          if (!in_array(strtolower($ext), $allowed_extensions)) {
              die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
          }
      
          // Generate unique file name
          $new_image_name = uniqid() . '.' . $ext;
          $upload_dir = 'uploaded_images/';
      
          // Ensure directory exists
          if (!is_dir($upload_dir)) {
              mkdir($upload_dir, 0777, true);
          }
      
          // Move file to the uploads directory
          $image_upload_path = $upload_dir . $new_image_name;
          if (move_uploaded_file($image_tmp_name, $image_upload_path)) {
              echo "File uploaded successfully: $image_upload_path";
          } else {
              echo "Error moving uploaded file.";
          }
      } else {
          echo "No file uploaded.";
      }
      ?>
      
















      ?>

      <script>
    /*Load comments when the page loads
    $(document).ready(function () {
      loadComments();
    });



 // Handle reaction button clicks dynamically
 $(document).on('click', '.reaction-button', function () {
      const postId = $(this).data('post-id');
      const reactionType = $(this).data('reaction-type');

      $.post("save_reaction.php", {
        post_id: postId,
        reaction_type: reactionType
      }, function () {
        alert("Reaction saved!");
      });
    });









    // Handle comment submission
    $('#comment_btn').click(function () {
      const postId = 17;
      const userId = 18;
      const commentText = $('#comment_text').val();

      if (commentText) {
        $.post("savecomment.php", {
          post_id: postId,
          user_id: userId,
          comment_text: commentText
        }, function (response) {
          $('#comment_text').val('');
              
          loadComments(); // Reload comments after submission
        });
      } else {
        alert("Please fill in all fields!");
      }
    });

    // Function to load comments
    function loadComments() {
      const postId = 17;

      $.get("displaycomment.php?post_id=" + postId, function (data) {
        $('#comments').html(data);
      });
    }*/



$(document).on("click", ".like-btn", function () {
    var button = $(this);
    var postId = button.data("post-id");

    $.ajax({
        url: "like_post.php",
        type: "POST",
        data: { post_id: postId },
        success: function (response) {
            var data = JSON.parse(response);

            if (data.status === "liked") {
                button.css("background-color", "#ff0000").text("Liked"); // Change to red
            } else {
                button.css("background-color", "#ccc").text("Like"); // Reset color
            }

            button.next(".like-count").text(data.likes); // Update like count
        }
    });
});

















   </script>
       

     <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
Facebook Share 
<a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_URL" target="_blank">
    <i class="fa-brands fa-facebook"></i> Share on Facebook
</a>

Twitter Share 
<a href="https://twitter.com/intent/tweet?url=YOUR_URL" target="_blank">
    <i class="fa-brands fa-twitter"></i> Share on Twitter
</a>

 Instagram (No direct share link, use profile link)
<a href="https://www.instagram.com/YOUR_PROFILE" target="_blank">
    <i class="fa-brands fa-instagram"></i> Visit Instagram
</a>

 WhatsApp Share 
<a href="https://api.whatsapp.com/send?text=YOUR_URL" target="_blank">
    <i class="fa-brands fa-whatsapp"></i> Share on WhatsApp
</a>-->

</body>
</html>