<?php
require_once 'controller_1.php';
require_once 'functtions.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icons/favicon.png">
    <title>profile page</title>
    <!--<script src="profile_photo.js" defer></script>-->
    <link rel="stylesheet" href="controller.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        
/*start of profile page styling*/
@font-face {
    font-family: Poppins;
    src: url(fonts/Roboto-Bold.ttf);
}

.profile_div_container{
    margin: 90px 0px;
}


.profile_conttent_container{
    width: 70%;    
    margin: 20px 20px 0px 29%;
    padding: 30px 0px 0px 0px;
    background-color: #fff;
    border-radius: 05px;    
}
.profile_div_content{    
    margin: 15px 70px 15px 100px;
    
}
.profile_div_attachement{
    width: 540.5px;
    height:238.75px;
    background-color:#f4f4f4;
    border-radius: 05px;    
}
.profile_div_attachement img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 05px;     
}
.profile_div_attachement img:hover{
    border-radius: 0px;
}
.profile_time{
    padding: 13px 10px 10px 20px;
}
.profile_subject{
    padding: 06px 10px 10px 10px;
    font-size: 19px;
}
.profile_blog_message{
    padding: 0px 60px 35px 10px ;
}

.profile_reaction{
    display: flex;    
    min-height: 40px;
    justify-content: space-between;
    
}
.profile_reaction_btn {
    width: 100px;
    color: #f4f4f4;
    margin: 15px 100px 15px 15px;
    padding: 9px 10px 9px 10px;
    border-radius: 6px;
    border:none;
    cursor: pointer;
    font-size: 14px;
    text-transform: capitalize;
    background-color: cadetblue;
}
.profile_reaction_btn a{
    color: #f4f4f4;
}
.profile_username{
    margin-top: 30px;
    font-size: 17px;
}
.profile_div_sidebar{
    width: 35%;
    height: 420px;
    padding: 10px 30px 10px 05px; 
    background-color: #fff;
    color:  cadetblue;
    border-radius: 10px;
}
.profile_userprofile_photo{
    width: 90px;
    height: 90px;
    margin-left: 56%;
    border-radius:50px; 
    background-color: #fff;
}

#profile_username{
    padding: 0px 03px 02px 10px;
}
.profile_userdetails{
    margin: 15px 0px 0px 17% ;
}
.profile_list{
    padding-top: 10px;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 500;
}
.profile_update{
    width: 300px;
}
.input{
    width: 190px; padding: 3px;
}
</style>
</head>
<body>
    <div class="index_sticky_header">
        <header class="index_header">

            <div>
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
                <div class="index_userprofile_photo" ><a href="profile.php?profile=1"> 
                
                <?php
                    
                    if(isset($user_info['user_profilephoto'])){
                        echo '<img src="uploaded_images/'.$user_info['user_profilephoto']. '" alt="profile picture" style="margin: auto;" class="index_userprofile_photo">';
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

            
    

     
    <div class="profile_div_container">   

     <!-- navigation bar-->
        <nav class="nav-bar"  >                 
                            
            <div style="display: flex;">                       
                <ul class="icons">
                    <li>
                        <a href="index.php">
                            <img src="icons/home_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px" id="all-icons">
                        </a>
                    </li>
                    <li>
                        <a href="tech.php">
                            <img src="icons/brand_awareness_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>
                    </li>                                
                    <li>
                        <a href="sport.php">
                            <img src="icons/add_diamond_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>  
                    </li>
                    <li>
                        <a href="entertainment.php">
                            <img src="icons/music_note_add_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>
                    </li>
                    <li>
                        <a href="politics.php">
                            <img src="icons/conditions_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>
                    </li>
                    <li>
                        <a href="fashion.php">
                            <img src="icons/hotel_class_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>
                    </li>
                    <li>
                    <a href="business.php">
                    <img src="icons/business_center_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                    </a>
                    </li>
                    <li>
                        <a href="health.php">
                            <img src="icons/pacemaker_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>
                    </li>
                    <li>
                        <a href="lifestyle.php">
                            <img src="icons/lift_to_talk_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
                        </a>
                    </li>
                    
                </ul>

                
                <div class="profile_div_sidebar" id="sidebar_profile" >
                    
                    <div class="profile_userprofile_photo" id="profile_div">
                    <?php
                    if(isset($user_info['user_profilephoto'])){
                        echo '<img src="uploaded_images/'.$user_info['user_profilephoto']. '" alt="profile picture" style="margin: auto;" class="profile_userprofile_photo">';
                    }else{
                    echo '<img src="uploaded_images/default_profile_img.png " alt="profile picture" style="margin: auto;" class="profile_userprofile_photo">';
                    }
                    ?>
                    </div>

                    <ul class="profile_userdetails">
                        <form action="profile.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="username" class="input"   id="username" value="<?php echo $user_info['user_name'];?>"><br><br>
                        <input type="file"  name="image" class="input"  id="profile_img"  ><br><br>
                        
                        <input type="text" name="useremail" class="input" id="useremail" value=" <?php echo $user_info['user_email'];?>"><br> <br> 
                        
                        <input type="submit" name="update" class="input"   value="Edit profile"><br><br>
                                        
                        </form>
                    
                    </ul>
                    
                </div>
                                                            
                
            </div>                        
               
        </nav>


         <!-- fetching and displing post from the database-->
         <?php        
          

        $sql= "SELECT * FROM posts_message  INNER JOIN user_account 
        ON posts_message.user_id = user_account.user_id where user_account.user_id = $user_id
        ORDER BY post_id DESC LIMIT 12";
            

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
                                            <img src="icons/heart_plus_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="like" class="react_btn" >
                                            <span id='like-count-<?php echo $post_id?>'> <?php echo $row['post_likes']?></span> 
                                        </button>

                                        <!-- comments-button-->
                                        <input type="hidden" id="post-id" value="<?php echo $post_id?>">
                                        <button type="button"  class="submit_reactions-comment">
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
                            <span class="loading-message" style="display:none;">Posting...</span>
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
                            ?>
                            
                        </div>
                    </div>
                                                      
                </div>
                <?php endwhile;?>
            </div>
            <?php endif;?> 

        
        
    </div> 
    <?php  $conn->close();?>
    

    <script>  

$(document).ready(function () {     
       
    $('.toggle-nav').click(function(){
        $('#nav-bar').slideToggle(150)
    });  
   
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
             
          form.find("textarea").val("");
        });
      },2000);
      } else {
        loadingMessage.hide();
        alert("Please fill in all fields!");
      }
    
    });    
</script>
</body>
</html>
