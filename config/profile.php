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
    <title>profile page</title>
    <!--<script src="profile_photo.js" defer></script>-->
    <link rel="stylesheet" href="controller.css">
</head>
<body>
<header class="profile_header">
       <div>
            <h1 class="profile_h1"><a href="index.php">Blog System</a></h1>
            <p class="profile_slogan">FOR FAST AND SECURE EMAIL DELIVERY</p>
        </div>
        <div>
            <h2 class="profile_h2">Profile</h2>
        </div>

        <div class="profile_div_btn">
            <li class="profile_li"><div class="profile_logout_div" id="profile_create_post"><a href="admin.php?admin=1" class="profile_logout">Creat Post</a></div></li>
            <li class="profile_li"><div class="profile_logout_div"><a href="index.php?logout=1" class="profile_logout">Logout</a></div></li>
        </div>
    </header>

    <?php  $user_info = getUserInfo($user_id,$conn);?>
    


    <div class="profile_div_container">
        <div class="profile_div_sidebar">
            
            <div class="profile_userprofile_photo" id="profile_div">
            <?php
            if(isset($user_info['user_profilephoto'])){
                echo '<img src="uploaded_images/'. $user_info['user_profilephoto']. '" alt="profile picture" style="margin: auto;" class="profile_userprofile_photo">';
            }else{
               echo '<img src="uploaded_images/default_profile_img.png " alt="profile picture" style="margin: auto;" class="profile_userprofile_photo">';
            }
            ?>
            </div>

            <ul class="profile_userdetails">
                <form action="profile.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" style="width: 190px; padding: 3px; text-align:left" id="username" value="<?php echo $user_info['user_name'];?>"><br><br>
                <input type="file"  name="image" class="profile_file" id="profile_img" style="width: 190px; padding: 3px;" ><br><br>
                
                <input type="text" name="useremail" style="width: 190px; padding: 3px;"  id="useremail" value=" <?php echo $user_info['user_email'];?>"><br> <br> 
                
                <input type="submit" name="update" style="width: 200px; padding: 3px;" value="Edit profile">
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
                    <p class="profile_time"><?Php $post_time = date("F j,Y g:i A", strtotime($row["post_created_at"]));
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
