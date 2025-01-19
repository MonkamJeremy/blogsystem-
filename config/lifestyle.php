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
    <title>lifestyle page</title>
    <link rel="stylesheet" href="mainstyle.css">
    
    
</head>
<body>
  <div class="index_con">
  <header class="index_header">
        <div>
          <a href="index.php"> <img src="icons/logo.png" alt="site_logo" style="width: 150px; margin-top:-29px;" >
          </a>
        </div>

        <div>
            <form method="get" action="search.php">
               <input type="search" name="search_data" id="" class="index_search" placeholder="Search" >
               <button name="search_btn" class="search_btn">
               <img src="icons/search_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="search icon"   >
               </button>
                  
              
            </form>
            
        </div>
        <?php $user_info = getUserInfo($user_id,$conn);?>

        <div class="index_div_container_btn">
            <li>
                <div class="profile_logout_div" id="create_btn">
                    <img src="icons/add_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="add button">
                    <a href="admin.php?admin=1" >Creat Post</a>
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
                <li class="index_cat_list"><a href="index.php?index=1" >All</a></li>
                <li class="index_cat_list"><a href="tech.php?tech=1"  >Technology</a></li>
                <li class="index_cat_list"><a href="sport.php?sport=1" >Sports</a></li>
                <li class="index_cat_list"><a href="entertainment.php?entertainment=1" >Entertainment</a></li>
                <li class="index_cat_list"><a href="politics.php?politics=1" >Politics</a></li>
                <li class="index_cat_list"><a href="fashion.php?fashion=1" >Fashion</a></li>
                <li class="index_cat_list"><a href="business.php?business=1" >Business</a></li>
                <li class="index_cat_list"><a href="health.php?health=1"  >Health</a></li>
                <li class="index_cat_list"><a href="lifestyle.php?lifestyle=1" id="all">Lifestyle</a></li>

            </ul>
        </div> 
        
    </div>

    
    <?php $sql= "SELECT * FROM posts_message  INNER JOIN user_account 
    ON posts_message.user_id = user_account.user_id where  post_category = 'Lifestyle'  ORDER BY post_id DESC LIMIT 21";
          
        $result = $conn->query($sql);
        if ($result-> num_rows > 0):?>
    <div class="index_div_content_container">
        
            
            <?php while($row = $result->fetch_assoc()):?>
            <div class="index_div_content">
                <div class="index_div_attachement">
                    <img src="uploaded_images/<?Php echo  $row['post_img'];?> " alt="<?Php echo $row['post_img']?>" class="index_div_attachement" id="attach">
                </div>
                <div>
                    <p class="index_time"><?Php $post_time = date("F j,Y g:i A", strtotime($row["post_created_at"]));
                   echo  $post_time?></p>
                </div>
                <div style="padding:0px 08px;">
                    <h4 class="index_subject"><?php echo $row["post_subject"]?></h4>
                    <div class="index_blog_message">
                       <p ><?Php echo $row["post_message"]?>
                       </p>
                    </div>
                   
                </div>
                
            

                <div class="index_div_reactions">
                    <div style="display:flex;">
                        <div class="index_div_userprofile_photo">
                        <img src="uploaded_images/<?php  echo $row['user_profilephoto'];?> " alt="profile picture" style="margin: auto;" class="index_div_userprofile_photo">
                        </div>
                        <p class="index_username"><?php echo $row['user_name']?></p>
                    </div>
                    <div class="index_reaction_btn">
                        <button>like</button>
                        <button>coment</button>
                        <button>share</button>
                    </div>
                    
                </div>
            </div>
            <?php endwhile;?>

            
       
    </div>
    <?php endif;?>
    <?php // else{ echo"0 result";} ?>

    <?php  $conn->close();?>
  </div>
</body>
</html>