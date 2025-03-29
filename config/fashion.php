<?php
require_once 'controller_1.php';
require_once 'functtions.php';


if(!isset($_SESSION['id'])) {
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icons/favicon.png">
    <title>fashion page</title>
    
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
       
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>

<body>
    <div class="index_con">

        <!-- haeder bar -->
        <div class="index_sticky_header">
            <header class="index_header">

                <div class="logo">
                <a href="index.php"> <img src="icons/logo.png" alt="site_logo" class="index_logo" >
                </a>
                </div>

                <div>
                    <form method="get" action="search.php" style="display:flex">
                        <input type="search" name="search_data" id="" class="index_search" placeholder="Search" >
                        <button name="search_btn" class="search_btn">
                        <img src="icons/search_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="search icon"   >
                        </button>                    
                    </form>
                    
                </div>
                <?php $user_info = getUserInfo($user_id);?>

                <div class="index_div_container_btn">
                    <li>
                        <div class="profile_logout_div" id="create_btn">
                            <img src="icons/add_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="add button">
                            <a href="admin.php" >Creat Post</a>
                        </div>
                    </li>
                    <li>
                        <div class="profile_logout_div" id="logout_btn">
                        <img src="icons/logout_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="logout button">
                        <a href="index.php?logout=1" class="logout" >Logout</a>
                        </div>
                    </li>
                    <div class="index_userprofile_photo" >
                        <a href="profile.php?profile=1">                         
                            <?php                                
                                if(isset($user_info['user_profilephoto'])){
                                    echo '<img src="uploaded_images/'. $user_info['user_profilephoto']. '" alt="profile picture" style="margin: auto;" class="index_userprofile_photo">';
                                }
                                else{
                                echo '<img src="uploaded_images/default_profile_img.png " alt="profile picture" style="margin: auto;" class="index_userprofile_photo">';
                                }
                            ?>
                        </a>
                    </div>
                </div>
                
            </header>

        </div>
        <section class="section_one">
                <!-- navigation bar-->
            <nav class="nav-bar"  >
                <div class="index_div_create">            
                    <div class="index_category"  ><br>
                        <div style="display: flex;">                       
                            <ul class="icons">
                                <li>
                                    <a href="index.php" class="linked">
                                        <img src="icons/home_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px" id="all-icons">
                                    </a>
                                </li>
                                <li>
                                    <a href="tech.php" class="linked">
                                        <img src="icons/brand_awareness_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a> 
                                </li>                                
                                <li>
                                    <a href="sport.php" class="linked">
                                        <img src="icons/add_diamond_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                <li>
                                    <a href="entertainment.php" class="linked">
                                        <img src="icons/music_note_add_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                <li>
                                    <a href="politics.php" class="linked">
                                        <img src="icons/conditions_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                <li>
                                    <a href="fashion.php" class="linked">
                                        <img src="icons/hotel_class_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                <li>
                                    <a href="business.php" class="linked">
                                        <img src="icons/business_center_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                <li>
                                    <a href="health.php" class="linked">
                                        <img src="icons/pacemaker_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                <li>
                                    <a href="lifestyle.php" class="linked">
                                        <img src="icons/lift_to_talk_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                                    </a>
                                </li>
                                
                            </ul>
                                            
                            <ul id="nav-bar">
                                <div  class="index_cat_list" >
                                    <li >                                
                                        <a href="index.php" class="linked">All</a>
                                    </li>
                                </div>
                                
                                <div class="index_cat_list">
                                    <li>                               
                                        <a href="tech.php" class="linked">Technology</a>
                                    </li>
                                </div>
                                
                                <div class="index_cat_list" >
                                    <li>                                
                                        <a href="sport.php" class="linked">Sports</a>
                                    </li>
                                </div>
                                
                                <div class="index_cat_list">
                                    <li>                               
                                        <a href="entertainment.php" class="linked">Entertainment</a>
                                    </li>
                                </div>
                               
                                <div class="index_cat_list">
                                    <li>                             
                                        <a href="politics.php" class="linked">Politics</a>
                                    </li>
                                </div>
                                
                                <div class="index_cat_list" id="active">
                                    <li>                                
                                        <a href="fashion.php" class="linked">Fashion</a>
                                    </li>
                                </div>
                               
                                <div class="index_cat_list">
                                    <li>                              
                                        <a href="business.php" class="linked">Business</a>
                                    </li>
                                </div>
                                
                                <div class="index_cat_list">
                                    <li>                                
                                        <a href="health.php" class="linked">Health</a>
                                    </li>
                                </div>
                               
                                <div class="index_cat_list">
                                    <li>                               
                                        <a href="lifestyle.php" class="linked">Lifestyle</a>
                                    </li>
                                </div>
                                
                            </ul>     
                        </div>                        
                    </div>                 
                </div>
            </nav>
            
            
            <!-- fetching and displing post from the database-->
            <?php        
            $sql= "SELECT * FROM posts_message  INNER JOIN user_account 
        ON posts_message.user_id = user_account.user_id where  post_category = 'Fashion'  ORDER BY post_id DESC LIMIT 21";
            $result = $conn->query($sql);
            if ($result-> num_rows > 0):?>
            <div class="index_div_content_container">          
                
                <?php while($row = $result->fetch_assoc()):?>
                <div class="index_div_content">
                    <div>
                        <div class="index_div_attachement">
                            <form action="fullpost.php" method="get">
                                <?php $post_id = $row['post_id'];
                                $user_id = $row['user_id']; ?>
                                <input type="hidden" class="post" id="post-id-<?php echo $post_id?>" value="<?php echo $post_id?>">
                                <input type="hidden" id="post-id" name="post_id" value=" <?php echo $row['post_id']?>">
                                <button type="button"  name="submit" style="border:none;background:transparent;"> <img src="uploaded_images/<?Php echo  $row['post_img'];?> " alt="<?Php echo $row['post_img']?>" class="index_div_attachement" id="attach" >
                            
                                </button>
                            </form>
                        
                        </div>

                        <div style="display:flex;">
                                <div class="index_div_userprofile_photo">
                                <a href="profile2.php?user_id=<?php echo $user_id ?>">
                                <img src="uploaded_images/<?php  echo $row['user_profilephoto'];?> " alt="profile picture" style="margin: auto;" class="index_div_userprofile_photo" >
                                </a>
                                </div>
                                            
                                <a href="profile2.php?user_id=<?php echo $user_id ?>">  
                                <p class="index_username"><?php echo $row['user_name']?></p>
                                </a>
                                <div class="index_time_div">
                                    <p class="index_time"><?Php $post_time = date(" g:i a  M d,Y ", strtotime($row["post_created_at"]));
                                    echo  $post_time?></p>
                                </div>
                        </div>             

                        <div style="padding:0px 08px;">
                            <h4 class="index_subject"><?php echo $row["post_subject"]?></h4>
                            <div class="index_blog_message">                  
                            <?php $post_id =$row['post_id']?> 
                             <textarea class="" name="" id="" cols="63" rows="5" readonly><?php echo $row["post_message"]?></textarea>
                                             
                            </div>
                                            
                            <div class="div_button">
                               
                                
                                <!-- reactions --> 
                                <div class="div_react_btn">
                                    <form >
                                        <?php $post_id= $row['post_id']?>
                                        <!-- likes-button-->
                                        <button type="button" class="submit_reactions-likes" 
                                            data-post-id="<?php echo $post_id?>"
                                            data-user-id="<?php echo $user_info['user_id']?>"> 
                                            <img src="icons/heart_plus_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="like" class="react_btn" id="like-btn" >
                                            <span id='like-count-<?php echo $post_id?>' class="span"> <?php echo $row['post_likes']?></span> 
                                        </button>

                                        <!-- comments-button-->
                                        <input type="hidden" id="post-id" value="<?php echo $post_id?>">
                                        <button type="button"  class="submit_reactions-comment" >
                                            <img src="icons/comment_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" class="react_btn">
                                            <span id='comment-count-<?php echo $post_id?>' ><?php echo $row['post_comments']?></span>
                                        </button>

                                        <!-- shares-button-->  
                                        <button type="button"  class="submit_reactions-share"
                                            data-post-id="<?php echo $post_id?>"> 
                                            <img src="icons/share_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" class="react_btn">
                                            <span id='share-count-<?php echo $post_id?>'><?php echo $row['post_share']?></span>
                                        </button> 

                                        <div class="share-links" id="share-links-<?php echo $post_id?>" style="display: none;">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_URL" target="_blank" class="facebook-share" data-platform="facebook" data-post-id="<?php echo $post_id?>" data-user-id="<?php echo $user_info['user_id']?>">
                                            <i class="fa-brands fa-facebook"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url=YOUR_URL" target="_blank" class="twitter-share" data-platform="twitter" data-post-id="<?php echo $post_id?>" data-user-id="<?php echo $user_info['user_id']?>">
                                            <i class="fa-brands fa-twitter"></i>
                                            </a>
                                            <a href="https://api.whatsapp.com/send?text=YOUR_URL" target="_blank" class="whatsapp-share" data-platform="whatsapp" data-post-id="<?php echo $post_id?>" data-user-id="<?php echo $user_info['user_id']?>">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            </a>                                                                        
                                        
                                        </div>
                                    </form>                        
                                </div>
                            </div>                         
                                                            
                        </div>    
                    </div>
                    <div>
                        <form class="comment-form">                        
                            <input type="hidden" class="post-id" id="post-id" value="<?php echo $post_id?>">
                            <input type="hidden" id="user-id" value="<?php echo $user_info['user_id']?>">
                            <textarea name="comment-message" id="user-comments" class="user-comments" cols="33" rows="4" placeholder="leave a comment"></textarea>                                                  
                            <button  type="submit" class="comments-button" id="comment-btn">Done</button>
                            <span class="loading-message" style="display:none;">Uploading comment...</span>
                        </form><br>
                        
                        <div id="display-comments-<?php echo $post_id?>" class="display-comments">
                            <?php
                            $comment_sql = "SELECT * FROM comments 
                            INNER JOIN user_account ON comments.user_id = user_account.user_id WHERE comments.post_id = ? ORDER BY created_at DESC";
                            $stmt = $conn->prepare($comment_sql);
                            $stmt->bind_param("i", $post_id);
                            $stmt->execute();
                            $comment_result = $stmt->get_result();
                            
                            if($comment_result-> num_rows > 0){
                            while ($rows = $comment_result->fetch_assoc()) {
                                $comment_id = $rows['comment_id'];
                              echo "
                                <div class='comment-item'>
                                    <div style='display:flex; width:245px;'>
                                        <div class='comm_div_userprofile_photo'>
                                            <a href='profile2.php?user_id=<?php echo $user_id ?>'>
                                            <img src ='uploaded_images/$rows[user_profilephoto]' alt ='user_profilephoto' class='comm_div_userprofile_photo'>
                                            </a>  
                                        </div>  
                                           
                                        <a href='profile2.php?user_id=$user_id '>
                                        <p style='padding-left:03px'>@$rows[user_name]</p>
                                        </a>
                                    
                                    
                                        <form>
                                            <button style='margin:05px 0px 0px 125px; background:transparent; border:none; cursor: pointer;' class='comment-toggle'
                                            data-post-id='$post_id'
                                            data-comment-id='$comment_id'>
                                            <img src ='icons/more_horiz_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png' style='width:20px'>
                                            </button>
                                            <div class='display-delete' id ='comment-reaction-$comment_id'>
                                                <div class='diplay-comm-react'  id ='comment-reaction-$comment_id'>
                                                    <button class='comm-react' id= 'delete-comment' data-comment-id='$comment_id'
                                                    data-post-id='$post_id' >Delete comment</button>
                                                    <button class='comm-react'>Edit comment</button>
                                                    
                                                </div>
                                            </div>
                                        </form>                                                                               
                                        
                                    </div>                                   
                                    
                                    <textarea name='' id='comments-text' cols='29' rows='03' >
                                    $rows[comment_text]</textarea>
                                </div><br>                                                         
                                                                                                       
                                                            
                              ";
                              
                            }
                            }else{
                              echo "...No comment found";
                            }
                            
                            
                            
                            
                            $stmt->close();
                            ?>
                            
                        </div>
                    </div>
                                                      
                </div>
                <?php endwhile;?>
                                    
            </div>
            <?php else: ?>
                <div class="index_div_content_container">
                    <div class="index_div_content">
                        <img src="icons/emergency_home_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png/" alt="" style="width:50px">
                        <h2  style="margin: auto;">No Post Found under this category!</h2>
                    </div>
                
                </div>
            

            <?php endif;?> 
           

        </section>
          
    </div>
    
<script>  

$(document).ready(function () {     
       
    $('.linked').click(function(event){
        event.preventDefault();      
               
        let pageUrl = $(this).attr("href"); // Get the target URL
                
        setTimeout(function(){
        window.location.href = pageUrl; // Navigate after delay
        }, 1000); // 2-second delay
            
    }); 
   
});
     
      

    $(document).on("click", ".submit_reactions-likes", function () {
        var button = $(this);
        var postId = button.data("post-id");
        var userId = button.data("user-id");
        var image = button.find(".react_btn");
        
        $.get("likes.php", {               
             post_id: postId,
             user_id: userId
            }, 
            function(response) {                
                const data = JSON.parse(response);
                $("#like-count-" + postId).text(`${data.post_likes}`); 

            // change button color
            if (data.status === "liked") {
                $(".submit_reactions-likes").css("background-color", "#5f9ea0"); 
                $(".submit_reactions-likes").css("color", "#fff");
                image.attr("src", "icons/heart_minus_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png");
                // Change to red
            } else {
                $(".submit_reactions-likes").css("background-color", "#f4f4f4");
                $(".submit_reactions-likes").css("color", "#000"); // Reset color
                image.attr("src", "icons/heart_plus_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png");
            }
      
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
    var form = $(this);
 // Handle comment submission
 $(document).on("submit", ".comment-form",function (e) {
      e.preventDefault();
      var form = $(this);
      var postId = form.find("input[id='post-id']").val();
      var userId = form.find("input[id='user-id']").val();          
      var commentText = form.find("textarea").val();
      var loadingMessage = form.find(".loading-message");
      
      loadingMessage.show();
      if (commentText) {
        setTimeout(function () {
        $.post("savecomment.php", {
          post_id: postId,
          user_id: userId,
          comment_text: commentText
        }, function (response) {
            loadingMessage.hide(); 
            
            // Function to load comments          
                
        $.get("displaycomment.php?post_id=" + postId, function (data) {
        $('#display-comments-' + postId).html(data);
        });
       
          // Reload comments after submission
          
        
        $.get("count_comment.php", { post_id: postId }, function (response) {
        const data = JSON.parse(response);
        $('#comment-count-' + postId).text(`${data.total_comments}`);
        });  
             
          form.find("textarea").val("");
        });
      },2000);
      } else {
        loadingMessage.hide();
        alert("Please fill in all fields!");
      }
    
    });

$('.comment-toggle').click(function(e){
    e.preventDefault(); 
    var commentId = $(this).data('comment-id');  
    $('#comment-reaction-'+commentId).slideToggle(100);
});
    // Delete comment
    
    $('.comm-react').click(function(e){
        e.preventDefault();
        var postId = $(this).data('post-id');
        var commentId = $(this).data('comment-id');
        
        if (confirm("Are you sure you want to delete this comment?")) {
        $.get("delete_comment.php",{
            post_id : postId,
           comment_id : commentId,
        }, function(response){
            alert("Post deleted successfully!");
            $(".comm-react[data-comment-id='" + commentId + "']").closest(".comment-item").remove();// Remove comment from UI
            var commentCount = $('#comment-count-' + postId); 
            var newCount = parseInt(commentCount.text()) - 1; 
            commentCount.text(newCount); // Update count dynamically
            //location.reload();
        });
    } else {
        // User clicked "Cancel" → Do nothing
        alert("Delete canceled.");
    }
    });

    // accesing other pages
   
</script>
  
</body>
</html>