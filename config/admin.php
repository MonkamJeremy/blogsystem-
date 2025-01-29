<?php 
require_once 'controller_1.php';
require_once 'upload.php';
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
    <title>Admin page</title>
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
    

    

    <div class="admin_container_div">
        <div class="admin_sidebar_div">
            <input type="submit" name="mail" value="New Post"  class="admin_input" id="admin_new_post"><br><br>
            <a href="profile.php?profile=1"> <input type="submit" value="Recent Post"  class="admin_input" id="admin_recent_post"></a><br><br>
            <input type="submit" name="i" value="Edit Posts" class="admin_input" id="admin_edit_post"><br><br> 
            <a href="index.php?logout=1"> <input type="submit" value="Logout"  class="admin_input" id="admin_new_post"></a>   
        </div>
        <form method="post" action="admin.php" enctype="multipart/form-data" class="admin_form">
            <div class="admin_form_div">
               

                <?php  if(count($errors) > 0):?>
                <div class="signup_alert">
                    <?php foreach($errors as $error):?>
                    <li><?php echo $error;?></li>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
               
                <label for="reciever" class="admin_label">Post Headline</label><br>
                <input type="text" name="subject" class="admin_input" placeholder="Enter post title"><br><br>
                
                <label for="reciever" class="admin_label" >Attachment</label><br>
                <input type="file" name="image" class="admin_input" placeholder="choose post image"><br><br>
                
                <label for="reciever" class="admin_label">Category</label><br>
                <select name="category" id="select" class="admin_input" >
                    <option value="Technology" class="admin_opion">Technology</option>
                    <option value="sports">sports</option>
                    <option value="entertainment">entertainment</option>
                    <option value="Politics">Politics</option>
                    <option value="Fashion">Fashion</option>
                    <option value="business">business</option>
                    <option value="Health">Health</option>
                    <option value="Lifestyle">Lifestyle</option>
                </select><br><br>
                <label for="message" class="admin_label">Message</label><br>
                <textarea name="message" id="message"  cols="40px" rows="05px" placeholder="Enter Message"></textarea><br><br>
                <input type="submit" name="post" id="admi_submit_btn" value="Make Post" class="admin_input">
                <input type="reset" name="submit" id="admi_submit_btn" class="admin_input">
            </div>
        </form>
    </div>
</body>
</html>