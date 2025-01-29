<?php
require_once 'controller_1.php'; 
require_once 'functtions.php';
$user_input="";

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icons/favicon.png">
    <title>Search page</title>
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
                        <li class="index_cat_list"><a href="index.php?index=1"  >All</a></li>
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

function search_post(){
    global $conn;
    global $user_input;
     $errors = array();
     if(isset($_GET['search_btn'])){
        $user_input= $_GET['search_data']; // get input

        if (empty($user_input)) {
            
            $errors["search_data"]=" data required";
        }
if(count($errors )> 0){
    foreach($errors as $error){
        echo $error;
    }
}else{
$search_post = "SELECT * FROM posts_message  WHERE( post_subject LIKE '%$user_input%' OR post_message LIKE '%$user_input%') LIMIT 0,9";  // LIMIT 0,9"; tp limit number to 9
$search_post_run = mysqli_query($conn, $search_post);

$sum_of_rows=mysqli_num_rows($search_post_run);
if($sum_of_rows < 1){// if not availabe
echo "<h4 class='text-center text-danger'>No result match!<br>
Try to using fewer words or first character only</h4>";
}
else{
    echo "<div class='index_div_content_container'>";
while($row=mysqli_fetch_assoc($search_post_run)){
$post_id=$row['post_id'];
$post_subject=$row['post_subject'];
$post_message=$row['post_message'];

$post_time = date("F j,Y g:i A", strtotime($row['post_created_at']));
$post_image=$row['post_img'];
echo"
<div class='index_div_content'>
<div class='index_div_attachement'>
    <img src='uploaded_images/$post_image ' alt='$post_image' class='index_div_attachement' id='attach'>
</div>
<div>
   <p class='index_time'> $post_time </p>
   
</div>
<div style='padding:0px 08px;''>
    <h4 class='index_subject'>$post_subject</h4>
      
</div>
<form action='fullpost.php' method='get' class='div_button' >
    <div>
        <input type='hidden' name='post_id' value=' <?php echo $row[post_id]?>'>
        <button class='seepost' name='submit'>                            
            <img src='icons/fullscreen_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png' alt='' >
            <a>View post</a>  
        </button>
    </div> 
    <div class='div_react_btn'>
        <img src='icons/favorite_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png' alt='' class='react_btn'><span>0</span>
        <img src='icons/comment2.png' alt='' class='react_btn'><span>0</span>
        <img src='icons/share.png' alt='' class= 'react_btn'><span>0</span>
    </div>
</form>

</div>";

































}
}
}
}//else{echo "<h2 class='text-center text-danger'> Out of stock, 
  //  nothing available now</h2>";}
}

search_post();
    ?>
</body>
</html>




