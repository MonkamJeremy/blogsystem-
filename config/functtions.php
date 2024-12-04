<?php 
require_once 'controller_1.php'; 
 $conn = new mysqli($host,$user,$password,$database);
 $user_id = $_SESSION['id'];
//function for fetching user info
    function getUserInfo($id,$conn){
    global $conn;
    $query = "SELECT * FROM user_account WHERE user_id = '$id'";
    $result = mysqli_query($conn,$query);
    $user_info =mysqli_fetch_assoc($result);
    return $user_info;
    }
   
   

    function updateUserProfile($id,$profilephoto){
        global $conn;
        $query = "UPDATE user_account SET user_profilephoto = '$profilephoto'
        WHERE user_id = '$id'";
        mysqli_query($conn,$query);
        
    }
    
   
   
   
// function for updating user info 
   if(isset($_POST['update'])){

   
    $image = $_FILES['image'];
    $image_name_profilephoto = $image['name'];
    $image_type = $image['type'];
    $image_tmp_name = $image['tmp_name'];

    $allowed = array('image/jpg','image/png','image/gif');

   if(in_array($image_type,$allowed)){
    $new_image_name = uniqid().'.'. pathinfo($image_name_profilephoto, PATHINFO_EXTENSION);
    $image_upload_path = 'uploaded_images/'.$new_image_name;

    move_uploaded_file($image_tmp_name, $image_upload_path);

    updateUserProfile($user_id,$new_image_name);
   }
   else{
    echo 'unable to update profile';
   }
   
}  
//funcion to get post

function editpost($conn){
    global $conn;
    global $post_id;
    global $user_id;
    if(isset($_POST['editpost'])){
        $post_id = $_POST['post_id'];
        $user_id = $_POST['user_id'];
        
     $sql= "SELECT * FROM posts_message  INNER JOIN user_account 
     ON posts_message.user_id = user_account.user_id WHERE post_id= $post_id AND posts_message.user_id = $user_id LIMIT 1";
           
        $post_result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($post_result);
        return $row;
        
        
    }
    
}

// function to update post table
function updatepost(){
    global $conn;
    global $post_id;
    global $user_id;
    if(isset($_POST['updatepost'])){
        $upsubject= $_POST['subject'] ;
        $upcategory= $_POST['category'] ;
        $upmassage= $_POST['message'] ;

        
        $upimage = $_FILES['image'];
        $image_name_profilephoto = $upimage['name'];
        $image_type = $upimage['type'];
        $image_tmp_name = $upimage['tmp_name'];

        $allowed = array('image/jpg','image/png','image/gif','image/vif');

       if(in_array($image_type,$allowed)){
            $new_image_name = uniqid().'.'. pathinfo($image_name_profilephoto, PATHINFO_EXTENSION);
            $image_upload_path = 'uploaded_images/'.$new_image_name;

            move_uploaded_file($image_tmp_name, $image_upload_path);

            $sql="UPDATE posts_message SET 
            post_subject = $upsubject,
            post_img = $new_image_name,
            post_category = $upcategory,
            post_message = $upmassage,post_created_at = NOW()          INNER JOIN user_account 
     ON posts_message.user_id = user_account.user_id WHERE post_id= $post_id AND posts_message.user_id = $user_id LIMIT 1 ";
        }
        header("location:index.php");
    }
   
}










   

    
?>