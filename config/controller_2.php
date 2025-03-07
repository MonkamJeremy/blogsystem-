<?php
//requirements and essencials
include("connet.php");
$errors= array();
$subject='';
$message='';
$category='';



  //collceting user details
if(isset($_POST['submit'])){
    $subject = $_POST['subject'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_type = $image['type'];
    $image_tmp_name = $image['tmp_name'];

    //allowed types for attachment
    $allowed_types = array('image/jpg','image/png','image/gif');

 //checking validation on input fills
   
    if(!preg_match("/^[a-zA-Z-' ]*$/", $subject)){
        $errors["subject"]="Only letter and whitespace allowed";
    }
    if (empty($subject)) {
        $errors["subject"]="Subject required";
    }
    if (empty($category)) {
        $errors["category"]="Category required";
    }
    

    if(!preg_match("/^[a-zA-Z-' ]*$/", $message)){
        $errors["message"]="Only letter and whitespace allowed";
    }

    if (empty($message)) {
        $errors["message"]="Message required";
    }

    //checking if no error exist before inserting data into the database

    if( count($errors)=== 0 ){

         
        $new_image_name = uniqid().'.'. pathinfo($image_name, PATHINFO_EXTENSION);
        $image_upload_path = 'uploaded_images/'.$new_image_name;
    
        move_uploaded_file($image_tmp_name, $image_upload_path);
    


        $query ="INSERT INTO posts_message(post_subject,post_img,post_category,post_message)
        VALUES('$subject', '$image_name','$category', '$message')";

        if(mysqli_query($conn,$query)){
            echo'data uploaded sucessfully!';
        }
        
        else{
            echo"data not inserted";
        }

    }
   
    else{
        echo'unable to store data!';
    }
    
    
}
mysqli_close($conn)


//redirecting the user back to the index page
/*

        $stmt = $conn->prepare(($query));
        $stmt->bind_param("ssss",$subject, $image_name,$category, $message);
    
        if($stmt->execute()){
            echo "data inserted";
        }
    
        else{
            echo"data not inserted";
        }




if(isset($_POST['submit'])) {
    header('location:index.php');
    exit();
} */


?>