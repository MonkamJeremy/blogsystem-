<?php 
require 'controller_2.php';
?>

<?php if(isset($_GET['outbox'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>outbox page</title>
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
        form{
            
            background-color: #fff;
            width: 99.9%;
            margin-bottom: 10px;
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
        #outbox{
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
            <h2>Outbox Mails</h2>
        </div>
        
    </header>
    
    
    <form method="post">
        <div class="container">
            <div class="inbox">
                <input type="submit" name="mail" value="New" id="inbox"><br><br>
                <input type="submit" name="inbox" value="inbox" id="inbox"><br><br>
                
                <a href="outbox.php?outbox=1"> <input type="submit" value="outbox" id="outbox"></a><br><br>

                
            </div>
            <?php $sql="SELECT * FROM message";
                $result=$conn->query($sql);
                if ($result-> num_rows > 0):?>
            <div class="form">
                
                    <?php while($row = $result->fetch_assoc()):?>
                      <div class="detail">
                      <?php
                       echo'Title: '. $row['mail_title'].'<br>';
                       echo'To: '. $row["mail_reciever"].'<br>';
                       echo'Message: '. $row['message']
                       
                       ?>
                      </div> <br> 
               <!-- <input type="email" name="sender" id="sender" readonly value=""><br><br>-->
               
                <?php endwhile;?>
                <?php endif;?>
                <?php else: echo"0 result";?>
            </div>
        </div>
    </form>
    <?php  $conn->close();?>
    
</body>
</html>
<?php endif;?>
<?php 

    
    if(isset($_POST['inbox'])){
        header('location:inbox.php');
        exit();
       }
       
        ?>