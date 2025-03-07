
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
$(document).ready(function () {  
    
  $('.toggle-nav').click(function(){
      $('#nav-bar').Toggle(250)
  });
 
  // code for handling likes on posts
  $(".submit_reactions-likes").click(function() {
    var postId = this.getAttribute("data-post-id");
    var userId = this.getAttribute("data-user-id");      
    
      $.get("likes.php", {               
           post_id: postId,
           user_id: userId
          }, 
          function(response) {                
              const data = JSON.parse(response);
              $("#like-count-" + postId).text(`${data.post_likes}`); 
    
          }          
      );       
  });


  //code for handling shares on posts

  
  $(".submit_reactions-share").click(function () {
      var postId = $(this).data("post-id");
      $("#share-links-" + postId).fadeToggle(300); // Show/hide share links
  });

  $(".share-links a").click(function (e) {
      e.preventDefault();

      var platform = $(this).data("platform");
      var postId = $(this).data("post-id");
      var userId = $(this).data("user-id");

      // Open social media share window
      var url = "https://yourwebsite.com/post.php?id=" + postId;
      if (platform === "facebook") {
          window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url), "_blank");
      } else if (platform === "twitter") {
          window.open("https://twitter.com/intent/tweet?url=" + encodeURIComponent(url), "_blank");
      } else if (platform === "whatsapp") {
          window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(url), "_blank");
      }

      // Update share count in the database using AJAX
      $.ajax({
          url: "update-share.php",
          type: "POST",
          data: { post_id: postId, user_id: userId },
          dataType: "json",
          success: function (data) {
              $("#share-count-" + postId).text(data.post_share);
          }
      });
  });

});

























/*$(document).ready(function () {
   loadCommentCount();

 
   
      $(".submit_reactions").click(function() {
        var postId = this.getAttribute("data-post-id");
        var userId = this.getAttribute("data-user-id");
        
        
          $.get("likes.php", {               
               post_id: postId,
               user_id: userId
              }, function(response) {
                 if (response.status === "liked") {
                     $("#like-status").text("Liked!");
                 } else {
                     $("#like-status").text("Unliked!");
                 }
             }
          );
     
        
      });
  
  });
  
   

 
 function loadCommentCount() {

   const postId = $('#post-id').val();
   
   $.get("count_comment.php?post_id=" + postId , function (response) {
     const data = JSON.parse(response);
     $('#comment-count').text(`${data.total_comments}`);
   });
 }




 /*$("#like-btn").click(function(){
   var userId = $('#user-id').val();
   var postId = $('#post-id').val();

   $.ajax({
       url: "like.php",
       type: "POST",
       data: { user_id,post_id: userId, postId },
       dataType: "json",
       success: function(response) {
           var likeCountSpan = button.find("#like-count");

           if (response.status === "liked") {
               button.addClass("liked");
               likeCountSpan.text(parseInt(likeCountSpan.text()) + 1);
           } else {
               button.removeClass("liked");
               likeCountSpan.text(parseInt(likeCountSpan.text()) - 1);
           }
       }
   });
});
*/









  






/* function handleclick(post_id){
    window.location.href = "fullpost.php?=" + post_id;
   
 }
     
 
 function getComment(post_id){
  var com = new XMLHttpRequest();
com.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
 document.getElementById("comment_btn").innerHTML = this.responseText;
}
};
com.open("POST", "functtions.php", true);
com.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
com.send('post_id'+ post_id);

}


function getComment(post_id){
var com = new XMLHttpRequest();

com.onreadystatechange= function() {
if ( this.readyState === 4 && this.status == 200) {
document.getElementById("comments").innerHTML = com.responseText;
}
};
    
com.open("POST", "displaycomment.php", true);
com.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
com.send('post_id' + post_id);

}
document.getElementById('comment_btn').addEventListener('click', function(){
    var post_id =document.getElementById('post_id').value
    
})
   getComment(post_id)
 



    // Get post ID from Ajax request
    $post_id = $_POST['post_id'];
    // Query comments from database
    $query = "SELECT * FROM comments WHERE post_id = '$post_id'";
    $result = $conn-query($query);
    // Display comments
    if ($result-num_rows  0) { while($row = $result-fetch_assoc()) { echo "<strong>" . $row['name'] . "</strong>: " . $row['comment'] . "/p"; }}
     else { echo "No comments found."}
     // Close database connection
    $conn-close();
    # Ajax Script (JavaScript)
    // Function to display comments
    function displayComments(post_id) {
       // Create Ajax request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'comments.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     // Send post ID to PHP script
      xhr.send('post_id=' + post_id);
       // Display comments
       xhr.onload = function() { if (xhr.status === 200) {document.getElementById('comments').innerHTML = xhr.responseTex } }}
       // Call function when button is clicked 
       document.getElementById('comment-button').addEventListener('click', function() { var post_id =document.getElementById('post-id').value;
        displayComments(post_id);});
       
*/




 //




   



   /* Handle reaction button clicks dynamically
   $(document).on('click', '#reaction-button', function () {
        const postId = $(this).data('post-id');
        const userId = $(this).data('user-id');
        const reactionType = $(this).data('#reaction-type');
  
        $.post("save_reactions.php", {
          post_id: postId,
          user_id:userId,
          reaction_type: reactionType
        }, function () {
          alert("Reaction saved!");
          loadReactions();
        });
      });
  
  
      function loadReactions() {
          const postId = $('#post-id').val();
      $.get("retrieve_reactions.php", { post_id: postId }, function (response) {
        const data = JSON.parse(response);
        $('#reaction-container').html(`
          <p>👍 Likes: ${data.likes} | 👎 Dislikes: ${data.dislikes}</p>
        `);
      });
    }
  
    // Load reactions for a specific post
    // Example post ID*/
  
   
  
   
    // Example post ID
    //const postId = 18; // Change this dynamically
    
  