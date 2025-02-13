<?php
require_once 'controller_1.php';
require_once 'upload.php';
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
    


    <div class="profile_div_container">
        <div class="profile_div_sidebar">
            
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
                
                <input type="submit" name="update" class="input"   value="Edit profile">
                </form>
            
            </ul>
              
        </div>
          
      <?php $sql= "SELECT * FROM posts_message  INNER JOIN user_account 
      ON posts_message.user_id = user_account.user_id where user_account.user_id = $user_id ORDER BY post_id DESC LIMIT 12";
          
        $result = $conn->query($sql);
        if ($result-> num_rows > 0):?> 

        <div class="profile_conttent_container">
        
            
            <?php while($row = $result->fetch_assoc()):?>
            <div class="profile_div_content">
                <div class="profile_div_attachement">
                    <img src="uploaded_images/<?Php echo  $row['post_img'];?> " alt="<?Php echo $row['post_img']?>">
                </div>
                <div>
                    <p class="profile_time"><?Php $post_time = date(" g:i a M j,Y ", strtotime($row["post_created_at"]));
                    echo  $post_time?></p>
                </div>
                <div style="padding:0px 08px;">
                    <h4 class="profile_subject"><?php echo $row["post_subject"]?></h4>
                    <div class="profile_blog_message">
                        <p ><?Php echo $row["post_message"]?>
                        </p>
                    </div>
                </div>
                
                <div class="profile_reaction">
                
                    <form action="editpost.php" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_info['user_id']?>">
                        <button type="submit" class="profile_reaction_btn" name="editpost">edit post</button></form> 
                        <button type="submit" class="profile_reaction_btn">delete post</button>
                    </form>
                </div>
            </div>
            <?php endwhile;?>
          


           
        
        </div> 
        <?php endif;?> 
    </div> 
    <?php  $conn->close();?>
</body>
</html>
