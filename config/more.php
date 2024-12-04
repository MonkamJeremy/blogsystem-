<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inbox</title>
    <style>
        .container{
            display: flex;  
        }
        .inbox{
            width: 90px;
            height: 270px;
            padding: 20px 0px 0px 20px;
            cursor: pointer;
            background-color: #ccc;
        }
       
        form{
            width: 45%;
            min-height: 70px;
            background-color: aquamarine;
            margin-left: 10px;
           
        }
        #read{
            margin-left: 80%;
        }
        h2{
            margin-left: 10%;
        }
        ul li{
           list-style-type: none;
        }
        
    </style>
</head>
<body>
<?php
include("connect.php");

echo" <h2>inbox</h2>";
echo"<div class='container'>";
echo" <div class='inbox'>";
echo"<input type='submit' name='inbox' value='inbox' id='inbox'><br><br>";
echo" <a href='send.php'><input type='submit' name='mail' value='mail' id='inbox'></a><br>";
echo" </div>";

if(isset($_POST['inbox'])){
$sql="SELECT * FROM message";
$result=$conn->query($sql);
if ($result-> num_rows > 0){
   echo" <form action='readmore.php' method=post>";
   echo"<ul>";  
            while($row = $result->fetch_assoc()){
           echo"<li>".$row['mail_id']. '<br>' .$row['mail_title']."<br>".$row['mail_sender']."</li>";
          // echo"<li>". $row['mail_sender']." </li>";
           echo"<input type='submit' value='readmore' name='readmore' id='read'>";
           echo"<hr>";
          
           
           
            }
            echo"</ul>";
            echo"</form>";
            echo"</div>";
         
        }else{
            echo"0 result";
        }
        $conn->close();
        }
        

?>
</body>
</html>



   
   
  
