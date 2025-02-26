<?php
require "connet.php";



$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$comment_text = $_POST['comment_text'];
$created_at = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO comments (post_id,user_id,comment_text,created_at) VALUES (?, ?, ?,?)");
$stmt->bind_param("iiss", $post_id, $user_id, $comment_text,$created_at);



// Increase like count
$conn->query("UPDATE posts_message SET post_comments =  post_comments + 1 WHERE post_id = $post_id");

// Get updated like count
$count_result = $conn->query("SELECT  post_comments FROM posts_message WHERE post_id = $post_id");
$count_row = $count_result->fetch_assoc();

echo json_encode([ " post_comments" => $count_row[' post_comments']]);

if ($stmt->execute()) {
    echo "Comment saved successfully!";
    header("location:fullpost.php");
} else {
    echo "Error saving comment: " . $conn->error;
}

$stmt->close();
$conn->close();
//}

/*

<?php
// Include the database connection
require 'db_connection.php'; // Make sure to include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate POST data
    if (!isset($_POST['post_id'], $_POST['user_id'], $_POST['comment_text'])) {
        die("Error: Missing required fields.");
    }

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $comment_text = trim($_POST['comment_text']); // Trim to remove unnecessary spaces
    $created_at = date("Y-m-d H:i:s");

    global $conn;
    
    // Check if the database connection exists
    if (!$conn) {
        die("Database connection error: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, comments_message, created_at) VALUES (?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iiss", $post_id, $user_id, $comment_text, $created_at);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Comment saved successfully!";
        $stmt->close();
        $conn->close();
        header("Location: fullpost.php");
        exit();
    } else {
        die("Error saving comment: " . $stmt->error);
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>














































$sql = "INSERT INTO comments(post_id,user_id,comments_message,created_at)
VALUES('$post_id','$user_id','$comment_message','$created_at')";

if(mysqli_query($conn,$sql)){
        
echo'comment sucessfully!';
}else{
echo'error posting comment';
}
}


$conn = mysqli_connect("localhost", "root", "", "blog_database"); // Replace with your database credentials


    $post_id = $_POST['post_id'];
    $user_name = $_POST['user_name'];
    $comment_text = $_POST['comment_text'];

    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_name, comment_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $post_id, $user_name, $comment_text);

    if ($stmt->execute()) {
        echo "Comment saved successfully!";
    } else {
        echo "Error saving comment: " . $conn->error;
    }

    $stmt->close();
    $conn->close();*/

?>

