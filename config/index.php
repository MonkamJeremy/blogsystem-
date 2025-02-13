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
    <title>home page</title>
    
    <link rel="stylesheet" href="mainstyle.css">
     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>
<body>
    <div class="index_con">
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

            <div class="index_div_create">
            <div class="index_category">
                    
                    <ul>
                        <li class="index_cat_list"><a href="index.php?index=1" id="all" >All</a></li>
                        <li class="index_cat_list"><a href="tech.php?tech=1" >Technology</a></li>
                        <li class="index_cat_list"><a href="sport.php?sport=1" >Sports</a></li>
                        <li class="index_cat_list"><a href="entertainment.php?entertainment=1" >Entertainment</a></li>
                        <li class="index_cat_list"><a href="politics.php?politics=1" >Politics</a></li>
                        <li class="index_cat_list"><a href="fashion.php?fashion=1" >Fashion</a></li>
                        <li class="index_cat_list"><a href="business.php?business=1" >Business</a></li>
                        <li class="index_cat_list"><a href="health.php?health=1" >Health</a></li>
                        <li class="index_cat_list"><a href="lifestyle.php?lifestyle=1" >Lifestyle</a></li>

                    </ul>
                </div> 
                
            </div>
        </div>
    

    
        <?php
        
        $sql= "SELECT * FROM posts_message  INNER JOIN user_account 
        ON posts_message.user_id = user_account.user_id  ORDER BY post_id DESC LIMIT 21";
            
            $result = $conn->query($sql);
            if ($result-> num_rows > 0):?>
        <div class="index_div_content_container">
            
            
            <?php while($row = $result->fetch_assoc()):?>
            <div class="index_div_content">
                <div class="index_div_attachement">
                    <form action="fullpost.php" method="get">
                    <?php $post_id = $row['post_id']?>
                <button  name="submit" style="border:none;background:transparent;"> <img src="uploaded_images/<?Php echo  $row['post_img'];?> " alt="<?Php echo $row['post_img']?>" class="index_div_attachement" id="attach" onclick=" handleclick($post_id)">
                <input type="hidden" name="post_id" value=" <?php echo $row['post_id']?>">
                </button>
                    </form>
                
                </div>

                <div style="display:flex;">
                        <div class="index_div_userprofile_photo">
                        <img src="uploaded_images/<?php  echo $row['user_profilephoto'];?> " alt="profile picture" style="margin: auto;" class="index_div_userprofile_photo" >
                        </div>
                        <p class="index_username"><?php echo $row['user_name']?></p>
                        <div class="index_time_div">
                            <p class="index_time"><?Php $post_time = date(" g:i a  M d,Y ", strtotime($row["post_created_at"]));
                            echo  $post_time?></p>
                        </div>
                </div>
                


                <div style="padding:0px 08px;">
                    <h4 class="index_subject"><?php echo $row["post_subject"]?></h4>
                    <div class="index_blog_message">
                    <!--<p >Php// echo $row["post_message"]?>
                    </p>-->
                    <?php $post_id =$row['post_id']?>
                    
                    </div>
                    
                    <form class="div_button" >
                        <div>
                            <input type="hidden" id="post_id" name="post_id" value=" <?php echo $row['post_id']?>">
                            <button class="seepost" name="submit">                            
                                <img src="icons/fullscreen_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" >
                                <a>View post</a>  
                            </button>
                        </div> 
                        <div class="div_react_btn">
                          <input type="hidden" id="post-id" name="post_id" value=" <?php echo $row['post_id']?>">
                          <input type="hidden" name="" id="user-id" value="<?php echo $user_info['user_id']?>">
                          <button type="submit" class="submit_reactions" id="reaction-button"> <img src="icons/favorite_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="like" class="react_btn"><span>0</span></button> 
                           <button type="submit"  class="submit_reactions"> <img src="icons/dislike.png" alt="" class="react_btn"><span>0</span></button>
                          <button type="submit"  class="submit_reactions"> <img src="icons/share.png" alt="" class="react_btn"><span>0</span></button> 
                        </div>
                    </form>
                    
                   
                    
                
                </div>
            
                
            

            </div>
            <?php endwhile;?>

                
        
        </div>
        <?php endif;?>
        <?php // else{ echo"0 result";} ?>
        
      
    </div>
  <script>
   



 // Handle reaction button clicks dynamically
 $(document).on('click', '#reaction-button', function () {
      const postId = $(this).data('post-id');
      const userId = $(this).data('user-id')
      const reactionType = $(this).data('reaction-type');

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
        const postId = $('#post_id').val();
    $.get("retrieve_reactions.php", { post_id: postId }, function (response) {
      const data = JSON.parse(response);
      $('#reaction-container').html(`
        <p>👍 Likes: ${data.likes} | 👎 Dislikes: ${data.dislikes}</p>
      `);
    });
  }

  // Load reactions for a specific post
  // Example post ID

  </script>
</body>
</html>