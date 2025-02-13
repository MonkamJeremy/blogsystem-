


 function handleclick(post_id){
    window.location.href = "fullpost.php?=" + post_id;
   
 }
     
 
 function getComment(post_id){
  var com = new XMLHttpRequest();
com.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
 document.getElementById("comment_btn").innerHTML = this.responseText;
}
};
com.open("POST", "functtions.php", true);
com.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
com.send('post_id'+ post_id);

}


function getComment(post_id){
var com = new XMLHttpRequest();

com.onreadystatechange= function() {
if ( this.readyState === 4 && this.status == 200) {
document.getElementById("comments").innerHTML = com.responseText;
}
};
    
com.open("POST", "displaycomment.php", true);
com.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
com.send('post_id' + post_id);

}
document.getElementById('comment_btn').addEventListener('click', function(){
    var post_id =document.getElementById('post_id').value
    
})
   getComment(post_id)
 



    // Get post ID from Ajax request
    $post_id = $_POST['post_id'];
    // Query comments from database
    $query = "SELECT * FROM comments WHERE post_id = '$post_id'";
    $result = $conn-query($query);
    // Display comments
    if ($result-num_rows  0) { while($row = $result-fetch_assoc()) { echo "<strong>" . $row['name'] . "</strong>: " . $row['comment'] . "/p"; }}
     else { echo "No comments found."}
     // Close database connection
    $conn-close();
    # Ajax Script (JavaScript)
    // Function to display comments
    function displayComments(post_id) {
       // Create Ajax request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'comments.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     // Send post ID to PHP script
      xhr.send('post_id=' + post_id);
       // Display comments
       xhr.onload = function() { if (xhr.status === 200) {document.getElementById('comments').innerHTML = xhr.responseTex } }}
       // Call function when button is clicked 
       document.getElementById('comment-button').addEventListener('click', function() { var post_id =document.getElementById('post-id').value;
        displayComments(post_id);});
       
//




 //



