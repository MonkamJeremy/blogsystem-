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
    <title>editpost page</title>
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
            <h2 class="profile_h2">Edit post</h2>
        </div>

        <div class="profile_div_btn">
            <!--<li class="profile_li"><div class="profile_logout_div" id="profile_create_post"><a href="admin.php?admin=1" class="profile_logout">Creat Post</a></div></li>-->
            <li class="profile_li"><div class="profile_logout_div"><a href="index.php?logout=1" class="profile_logout">Logout</a></div></li>
        </div>
    </header>

    <?php  $user_info = getUserInfo($user_id,$conn);?>
    
    

    <div class="profile_div_container">
       <!-- <div class="profile_div_sidebar">
            
            <div class="profile_userprofile_photo" id="profile_div">
            <?php
           /* if(isset($user_info['user_profilephoto'])){
                echo '<img src="uploaded_images/'. $user_info['user_profilephoto']. '" alt="profile picture" style="margin: auto;" class="profile_userprofile_photo">';
            }else{
               echo '<img src="uploaded_images/default_profile_img.png " alt="profile picture" style="margin: auto;" class="profile_userprofile_photo">';
            }*/
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
              
        </div>-->
        <?php $row = editpost($conn);
        updatepost();?>
      
        <form method="post" action="editpost.php"  enctype="multipart/form-data">
        <div class="profile_conttent_containe">
        
                
           
            <div class="profile_div_content">

            <label for="">image</label>
                <div class="profile_div_attachement">
                    
                    <img src="uploaded_images/<?Php echo  $row['post_img'];?> " alt="<?Php echo $row['post_img']?>">
                </div><br>
                <input type="file" name="image" id="" value="<?Php echo  $row['post_img'];?>"><br><br>
                
                <div >
                <label for="">subject</label><br>
                    <input onchange="0" type="text" class="profile_subject" name="subject" value="<?php echo $row["post_subject"]?>"><br><br>
                    <label for="">category</label><br>
                    <select onselect="" name="category" id="" class="edit_select">
                    <option value="<?php echo $row["post_category"]?>"><?php echo $row["post_category"]?></option>
                        <option value="technology" class="edit_select">technology</option>
                        <option value="entertainment">entertainment</option>
                        <option value="sports">sports</option>
                        <option value="fashion">fashion</option>
                        <option value="business">business</option>
                        <option value="health">health</option>
                        <option value="lifestyle">lifestyle</option>
                    </select><br><br>
                    <div class="profile_blog_message">
                    <label for="">message</label><br>
                        <textarea name="" id=""  cols="70px" rows="10px" name="message"><?Php echo $row["post_message"]?></textarea>
                        
                        
                    </div>
                </div>
                
                <div class="profile_reaction">
               
                
                <button type="submit" class="profile_reaction_btn" name="updatepost">update post</button> 
                    
                </div>
            </div>
        </div> 
        </form>
         
    </div> 
    <?php  $conn->close();
    ?>
</body>
</html>
