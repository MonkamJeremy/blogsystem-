<?php 
require_once 'controller_1.php';
require_once 'upload.php';
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
    <title>Admin page</title>
    <link rel="stylesheet" href="controller.css">
</head>
<body>
    <header class="admin_header">
        <!--<img src="controllers/SENAM.png" alt="logo" id="logo">-->
        
        <h2 class="admin_h2" ><a href="index.php">Create Post</a></h2>
    </header>
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
               
                <label for="reciever" class="admin_label">Subject</label><br>
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
                <textarea name="message" id="message"  cols="60px" rows="10px" placeholder="Enter Message"></textarea><br><br>
                <input type="submit" name="post" id="admi_submit_btn" value="Make Post" class="admin_input">
                <input type="reset" name="submit" id="admi_submit_btn" class="admin_input">
            </div>
        </form>
    </div>
</body>
</html>