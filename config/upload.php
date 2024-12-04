<?php
require_once "connet.php";
require_once "controller_1.php";
$errors= array();
$subject='';
$message='';
$category='';



if(isset($_POST['post'])){
    $subject = $_POST['subject'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_type = $image['type'];
    $image_tmp_name = $image['tmp_name'];

    $current_time = date("Y-m-d H:i:s");
    $user_id = $_SESSION['id'];
    
    // allowed file type
    //$allowed = array('image/jpg','image/png','image/gif');


    //checking validation on input fills
    
    if (empty($subject)) {
        $errors["subject"]="Subject required";
    }
    if (empty($image)) {
        $errors["image"]="image file required";
    }

    if (empty($message)) {
        $errors["message"]="Message required";
    }

    if (empty($category)) {
        $errors["category"]="Category required";
    }

    if(!preg_match("/^[a-zA-Z-' ]*$/", $subject)){
        $errors["subject"]="Only letter and whitespace allowed";
    }

   

   







    //validate file type
    
    if(count($errors)=== 0){
        //if(in_array($image_type,$allowed)){
        

            //upload file
            $new_image_name = uniqid().'.'. pathinfo($image_name, PATHINFO_EXTENSION);
            $image_upload_path = 'uploaded_images/'.$new_image_name;

            move_uploaded_file($image_tmp_name, $image_upload_path);

            //insert image path into db
            
            $sql= "INSERT INTO posts_message(user_id,post_subject,post_img,post_category,post_message,post_created_at)
            VALUES('$user_id','$subject','$new_image_name','$category','$message','$current_time')";


            if(mysqli_query($conn,$sql)){
                
                echo'image uploaded sucessfully!';
            }else{
                echo'error uploading image!';
            }
            
       // }
        header("location:index.php");
    }
    
}

mysqli_close($conn)
?>