<?php 
require 'controller_2.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inbox page</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        body{
           background-color: #f4f4f4;
        }
        /*div{
            border: 1px solid #ddd;
        }*/ 
        .container{
            display: flex;
           
        }
        header{
            /*border: 1px solid #ccc;*/
            background-color: rgb(32, 200, 192);;
            display: inline-block;
            width: 99.9%;
        }
        
        input,textarea{
            width: 70%;
            min-height: 20px;
            border-radius: 5px;
            padding: 5px;
            border:  1px solid #ccc;
        }
        .detail{
            width: 70%;
            min-height: 30px;
            border-radius: 5px;
            padding: 5px;
            border:  1px solid #ccc;
            background-color: #f4f4f4;
        }
        .form{
         width: 70%;
         padding-left: 7%;
         background-color: lightseagreen;
         padding-top: 30px;
        }
        
        h2{
            margin: 0px 0px 10px 40%;
        }
        .inbox{
            width: 30%;
            height: 370px;
            padding: 20px 0px 0px 20px;
            background-color:#ccc;
        }
        label{
            font-size: 18px;
        }
        #submit{
            width: 10%;
            background-color: rgb(32, 200, 192);;
            cursor: pointer;
            margin-left: 60%;
        }
        li{
            list-style: none;
            margin-left: 90%;
            margin-top: 10px;
        }
        li a{
            text-decoration: none;
        }
        .logout{
            background-color: #f4f4f4;
        }
        h3{
            margin-left: 20px;
        }
        #inbox{
          width: 70%;
          cursor: pointer;
        }
        #nbox{
            width: 70%;
            cursor: pointer;
            background-color:tan;
        }
        #dbform{
            background-color: #ccc;
        } 
        .h2{
            display: flex;
        }
    </style>
</head>
<body>
    <header>
            <h2>Inbox Mails</h2>
        </div>
        
    </header>
    
   
    
        <div class="container">
            <div class="inbox">
                <form method="post"><input type="submit" name="mail" value="New" id="inbox"><br><br></form>
                <input type="submit" name="inbox" value="inbox" id="nbox"><br><br>
                <a href="outbox.php?outbox=1"> <input type="submit" value="outbox" id="inbox"></a><br><br>

                
            </div>
           
        </div>
        <form method="post" >
    </form>
    
</body>
</html>

<?php 

    if(isset($_POST['inbox'])){
        header('location:inbox.php');
        exit();
        } 
        if(isset($_GET['outbox'])){
            header('location:outbox.php');
            exit();
            } 
            
        

    
?>