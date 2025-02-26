<?php
require "connet.php";
require_once 'controller_1.php';


$user_id = $_SESSION['user_id']; // Assume user is logged in

// Fetch posts along with their like counts
$sql = "SELECT p.id, p.content, p.likes_count, 
        (SELECT COUNT(*) FROM likes WHERE user_id = $user_id AND post_id = p.id) as liked
        FROM posts p";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like Button</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .like-btn {
            padding: 10px;
            border: none;
            cursor: pointer;
            background-color: #ddd;
            color: black;
        }
        .liked {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<?php while ($row = $result->fetch_assoc()): ?>
    <div>
        <p><?php echo $row['content']; ?></p>
        <button class="like-btn <?php echo ($row['liked'] > 0) ? 'liked' : ''; ?>" 
                data-post-id="<?php echo $row['id']; ?>">
            Like (<span class="like-count"><?php echo $row['likes_count']; ?></span>)
        </button>
    </div>
    <hr>
<?php endwhile; ?>

<script>
$(document).ready(function(){
    $("#like-btn").click(function(){
        var userId = $('#user-id').val();
        var postId = $('#post-id').val();

        $.ajax({
            url: "like.php",
            type: "POST",
            data: { user_id,post_id: userId, postId },
            dataType: "json",
            success: function(response) {
                var likeCountSpan = button.find("#like-count");

                if (response.status === "liked") {
                    button.addClass("liked");
                    likeCountSpan.text(parseInt(likeCountSpan.text()) + 1);
                } else {
                    button.removeClass("liked");
                    likeCountSpan.text(parseInt(likeCountSpan.text()) - 1);
                }
            }
        });
    });
});
</script>

<?php


$user_id = $_POST['user_id']; // Assume the user is logged in
$post_id = $_POST['post_id'];

// Check if the user has already liked the post
$sql = "SELECT * FROM likes WHERE user_id = $user_id AND post_id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Unlike the post
    $conn->query("DELETE FROM likes WHERE user_id = $user_id AND post_id = $post_id");
    $conn->query("UPDATE posts SET post_likes = post_likes - 1 WHERE id = $post_id");
    echo json_encode(["status" => "unliked"]);
} else {
    // Like the post
    $conn->query("INSERT INTO likes (user_id, post_id) VALUES ($user_id, $post_id)");
    $conn->query("UPDATE posts SET post_likes = post_likes + 1 WHERE id = $post_id");
    echo json_encode(["status" => "liked"]);
}

$conn->close();

?>

<?php
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
            p.id AS post_id, 
            p.content, 
            p.created_at, 
            u.id AS user_id,
            u.name AS author_name, 
            COUNT(DISTINCT l.id) AS like_count, 
            COUNT(DISTINCT c.id) AS comment_count, 
            COUNT(DISTINCT s.id) AS share_count
        FROM posts p
        JOIN users u ON p.user_id = u.id
        LEFT JOIN likes l ON p.id = l.post_id
        LEFT JOIN comments c ON p.id = c.post_id
        LEFT JOIN shares s ON p.id = s.post_id
        GROUP BY p.id, u.id
        ORDER BY p.created_at DESC";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $row['author_name'] . " posted:</h3>";
    echo "<p>" . $row['content'] . "</p>";
    echo "<p>Likes: " . $row['like_count'] . " | Comments: " . $row['comment_count'] . " | Shares: " . $row['share_count'] . "</p>";
    echo "</div><hr>";
}

$conn->close();
?>

<?php
session_start();
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = $_POST['post_id'];

// Update the shares count
$sql = "UPDATE posts SET shares_count = shares_count + 1 WHERE id = $post_id";
if ($conn->query($sql) === TRUE) {
    // Get the updated count
    $result = $conn->query("SELECT shares_count FROM posts WHERE id = $post_id");
    $row = $result->fetch_assoc();
    echo json_encode(["status" => "success", "shares" => $row['shares_count']]);
} else {
    echo json_encode(["status" => "error"]);
}

$conn->close();
?>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = $_POST['post_id'];
$user_id = 1; // Change this to the logged-in user ID

$conn->query("INSERT INTO shares (post_id, user_id) VALUES ($post_id, $user_id)");

// Get updated share count
$result = $conn->query("SELECT shares_count FROM posts WHERE id = $post_id");
$row = $result->fetch_assoc();
echo $row['shares_count'];

$conn->close();
?>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = $_POST['post_id'];
$user_id = 1; // Change this to the logged-in user ID

// Check if the user already liked the post
$check_like = $conn->query("SELECT * FROM likes WHERE post_id = $post_id AND user_id = $user_id");

if ($check_like->num_rows > 0) {
    // Unlike the post
    $conn->query("DELETE FROM likes WHERE post_id = $post_id AND user_id = $user_id");
} else {
    // Like the post
    $conn->query("INSERT INTO likes (post_id, user_id) VALUES ($post_id, $user_id)");
}

// Get updated like count
$result = $conn->query("SELECT likes_count FROM posts WHERE id = $post_id");
$row = $result->fetch_assoc();
echo $row['likes_count'];

$conn->close();
?>
<script>
$(document).ready(function(){
    $(".like-btn").click(function(){
        var postId = $(this).data("post-id");
        var button = $(this);

        $.post("like.php", { post_id: postId }, function(data) {
            button.text("Like (" + data + ")");
        });
    });

    $(".comment-btn").click(function(){
        var postId = $(this).data("post-id");
        var commentText = prompt("Enter your comment:");

        if (commentText) {
            $.post("comment.php", { post_id: postId, comment_text: commentText }, function(data) {
                alert("Comment added! Total comments: " + data);
            });
        }
    });

    $(".share-btn").click(function(){
        var postId = $(this).data("post-id");

        $.post("share.php", { post_id: postId }, function(data) {
            alert("Post shared! Total shares: " + data);
        });
    });
});
</script>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = $_POST['post_id'];
$user_id = 1; // Change this to the logged-in user ID
$comment = $_POST['comment_text'];

$conn->query("INSERT INTO comments (post_id, user_id, comment_text) VALUES ($post_id, $user_id, '$comment')");

// Get updated comment count
$result = $conn->query("SELECT comments_count FROM posts WHERE id = $post_id");
$row = $result->fetch_assoc();
echo $row['comments_count'];

$conn->close();
?>

</body>
</html>
