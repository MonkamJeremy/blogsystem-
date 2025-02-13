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

      <script>
    // Load comments when the page loads
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
    }
  </script>
       
</body>
</html>