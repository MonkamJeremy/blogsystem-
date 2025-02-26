<?php

$_GET['submit'];
$post_id = $_GET['post_id'];


$sql= "SELECT * FROM posts_message  INNER JOIN user_account 
ON posts_message.user_id = user_account.user_id  WHERE post_id = ? LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result-> num_rows > 0)
echo "<head>
<link rel='stylesheet' href='mainstyle.css'>
</head>";
echo "<div class='full_div_content_container'>
 $row = $result->fetch_assoc()";
            echo "<div class='full_div_content'>
                <div class='full_div_attachement'>
                    $post_id = $row[post_id]
                    <img src='uploaded_images/$row[post_img];' alt='$row[post_img]' class='full_div_attachement' id='attach'>
                    
                </div>

                <div style='display:flex;'>
                <div class='full_div_userprofile_photo'>
                <img src='uploaded_images/$row[user_profilephoto]' alt='profile picture' style='margin: auto;' class='full_div_userprofile_photo' >
                        </div>
                        <p class='full_username'>$row[user_name]</p>
                        <div class='full_time_div'>
                            <p class='full_time'>$post_time = date(g:i a M j,Y ', strtotime($row[post_created_at]));
                             $post_time</p>
                        </div>
                        <div class='full_reaction_btn'>                        
                            <button><img src='icons/favorite_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png' alt='like-button'>0</button>                        
                            <button><img src='icons/share.png' alt='share-button'>  0</button>
                        </div>
                </div>
                


                <div style='padding:0px 08px;'>
                    <h4 class='full_subject'>$row[post_subject]</h4>
                    <div class='full_blog_message'>
                        <p > $row[post_message]
                        </p>
                         $post_id =$row[post_id]
                        
                    </div>
                    
                    
                    
                </div>
                
                
            
               
                <div class='full_div_reactions'>
                    <form  id='comment-form' action='fullpost.php' method='post'>
                        <textarea name='comment' class='full_comment' id='comment_text'  cols='0' rows='0' placeholder='leave a coment'></textarea>
                        <input type='hidden' id ='user_id'  value=' $user_info[user_id]'>
                        <input type='hidden' name='post_id' id='post_id' value=' $row[post_id]'>
                        
                        <button class='full_comment_done' id='comment_btn'>Done</button>
                    </form>
                    <div class='full_pipo_comment'  > 
                       
                       <p id='comments' ></p>
                        
                    </div>
                    
                    
                </div>
            </div>
            
</div>";