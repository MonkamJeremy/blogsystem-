<?php
require_once 'controller_1.php'; 

function search_product(){
    global $conn;
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
$search_post = "SELECT * FROM posts_message  WHERE post_subject LIKE '%$user_input%' LIMIT 0,9";  // LIMIT 0,9"; tp limit number to 9
$search_post_run = mysqli_query($conn, $search_post);

$sum_of_rows=mysqli_num_rows($search_post_run);
if($sum_of_rows < 1){// if not availabe
echo "<h4 class='text-center text-danger'>No result match!<br>
Try to using fewer words or first character only</h4>";
}
else{
while($row=mysqli_fetch_assoc($search_post_run)){
$post_id=$row['post_id'];
$post_subject=$row['post_subject'];
$post_message=$row['post_message'];

$post_category=$row['post_category']; 
$post_image_1=$row['post_img'];


echo"<section class='col-md-4 mb-2'>

<div class='card' >
<img src='uplaoded_images/$post_image_1' class='card-img-top img-fluid' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$post_subject</h5>
<p class='card-text'>$post_message</p>

</div>
</div> 
</section> ";

}
}
}
}//else{echo "<h2 class='text-center text-danger'> Out of stock, 
  //  nothing available now</h2>";}
}

search_product();
?>















