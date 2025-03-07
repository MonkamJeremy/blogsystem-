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
    <title>Admin page</title>

    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
   /*     div{
    border: 1px solid #000;
}*/
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

.admin_container_div{
    width: 99.8%;
    display: flex;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin-top: 60px;
    padding-top: 25px;
    background-color: #f4f4f4;
}



.admin_form{    
    width: 84%;
    margin:20px 0px 0px 11%;
    border-radius: 5px;
    background-color: #fff;
    padding-top: 30px;
    
}
.admin_input{
    width: 68%;
    height: 25px;
    border-radius: 5px;
    padding: 9px;
    border:  1px solid #ccc;
}
.admin_input:focus{
    box-shadow: 01px 02px 3px 02px #fff;
    border: none;
    outline: 1px solid #5f9ea0;    
}
.admin_select{
    width: 70%;
    height: 29px;
    border-radius: 5px;
    padding: 5px;
    border:  1px solid #ccc;
}
textarea{
    border-radius: 05px;
}
textarea:focus{
    box-shadow: 01px 02px 3px 02px #fff;
    border: none;
    outline: 1px solid #5f9ea0;
}
@font-face {
    font-family: Roboto;
    src: url(fonts/Roboto-Regular.ttf);
}
.admin_btn{
    font-family:'Roboto',sans-serif ;
    font-size: 16px;
    border-radius: 5px;
    padding: 15px;
    border: none;
    color: #fff;
    width: 70%;
    background-color: cadetblue;
    cursor: pointer;
    
}
.admin_form_div{
 padding-left: 15%;
 padding-bottom: 65px; 
}
.icons{
    width: 04%;
    height: 100vh;
    position: fixed;
    padding: 20px 0px 0px 10px;
    background-color:#fff;
    box-shadow: 03px 0px 3px 02px #e7e5e5; 
      
}
.icons li{
    list-style-type: none;
}
.admin_label{
    font-size: 18px;
    color: cadetblue;
}


.admin_h2{
    padding:5px 0px 0px 42%;
    color: cadetblue;
}

.admin_opion:hover{
    background-color: #023030;
}
.admin_alert{
    padding:10px 10px;
    background-color: bisque;
    color: #023030;
}

.admin_slogan{
    font-size: 10px;
    color: cadetblue;
    padding-left: 16px;
    font-family: Arial, Helvetica, sans-serif;
}
#message{
    padding:10px 10px ;
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

           
    

    

    <div class="admin_container_div" >

        <ul class="icons">
            <li>
            <img src="icons/home_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px" id="all-icons">
            </li>
            <li>
            <img src="icons/brand_awareness_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>                                
            <li>
                <img src="icons/add_diamond_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            <li>
            <img src="icons/music_note_add_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            <li>
            <img src="icons/conditions_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            <li>
            <img src="icons/hotel_class_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            <li>
            <img src="icons/business_center_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            <li>
            <img src="icons/pacemaker_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            <li>
            <img src="icons/lift_to_talk_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" width="25px">
            </li>
            
        </ul>
        
        <form class="admin_form" >
            
            <div class="admin_form_div">          
                             
               
                <label for="reciever" class="admin_label">Post Headline</label><br>
                <input type="text" name="subject" class="admin_input" placeholder="Enter post title"><br><br>
                
                <label for="reciever" class="admin_label" >Attachment</label><br>
                <input type="file" name="image" class="admin_input" placeholder="choose post image"><br><br>
                
                <label for="reciever" class="admin_label">Category</label><br>
                <select name="category" id="select" class="admin_select" >
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
                <textarea name="message" id="message"  cols="70px" rows="06px" placeholder="Enter Message"></textarea><br><br>
                <span class="loading-message" style="display: none;">Uploading your post...</span><br>
                <button type="submit" name="post" id="admi_submit_btn"  class="admin_btn">Make Post </button>
                
            </div>
        </form>
    </div>
<script>
         // Handle post submission

         $(document).on("submit", ".admin_form", function (e) {
    e.preventDefault(); // Prevent page reload

    var form = $(this);
    var postSubject = form.find("input[name='subject']").val();
    var postImage = form.find("input[name='image']")[0].files[0];  
    var postCategory = form.find("select").val();
    var postMessage = form.find("textarea").val();
    var loadingMessage = form.find(".loading-message");

    // Validate input fields
    if (!postSubject || !postImage || !postCategory || !postMessage) {
        alert("Please fill in all fields!");
        return;
    }

    loadingMessage.show(); // Show loading message
    setTimeout(function () {
    // Create FormData to send files
    var formData = new FormData();
    formData.append("post_subject", postSubject);
    formData.append("post_image", postImage); // Image must be sent as FormData
    formData.append("post_category", postCategory);
    formData.append("post_message", postMessage);

    // Send AJAX request with FormData
    $.ajax({
        url: "upload.php", // PHP script that handles upload
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from processing data
        contentType: false, // Prevent jQuery from setting content type
        success: function(response) {
            loadingMessage.hide(); // Hide loading message
            //alert(response); // Show response from PHP
            
            // Clear the form fields
            form.find("input[name='subject']").val("");
            form.find("input[name='image']").val("");                    
            form.find("textarea").val("");

            // Redirect after successful upload
            window.location.href = "index.php";
        },
        error: function() {
            loadingMessage.hide();
            alert("Error uploading image. Please try again.");
        }
    });
},2000);
});















         /*
    $(document).on("submit", ".admin_form",function (e) {
      e.preventDefault();
      var form = $(this);
      var postSubject = form.find("input[name='subject']").val();
      var postImage = form.find("input[name='image']")[0].files[0];  
      var postCategory = form.find("select").val();         
      var postMessage = form.find("textarea").val();
      var loadingMessage = form.find(".loading-message");
      
     
    if (postImage) {
        loadingMessage.show();        
        setTimeout(function () {
            $.post("upload.php", {
                post_subject: postSubject,
                post_image: postImage,
                post_category: postCategory,
                post_message:postMessage
            }, function (response) {
                loadingMessage.hide();                                
                form.find("input[name='subject']").val("");
                form.find("input[name='image']").val("");                    
                form.find("textarea").val("");
                window.location.href = "index.php";// Load PHP content dynamically                                    
                
            });
        },3000);
    } else {
        loadingMessage.hide();
        alert("Please fill in all fields!");
      }
 });*/
</script>
</body>
</html>