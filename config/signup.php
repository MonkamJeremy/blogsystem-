<?php
require_once 'controller_1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/png" href="icons/favicon.png">
    <title>Sign up</title>
    <link rel="stylesheet" href="controller.css">
</head>
<body>
    <h2 class="signup_h2">BlogZone</h2>
    <form method="post" action="signup.php" class="signup_form">
        <div class="signup_legend_div">
          <legend class="signup_legend">Register</legend><br><br>
        </div>
        <?php  if(count($errors) > 0):?>
        <div class="signup_alert">
            <?php foreach($errors as $error):?>
            <li><?php echo $error;?></li>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
         
        <div class="signup_inputs_div">
            <label>Username</label><br>
            <input type="text" name="name" class="signup_inputs" value="<?php echo $name;?>" ></input><br><br>
            <label>Email</label><br>
            <input type="text" name="email" class="signup_inputs" value="<?php echo $email;?>"><br><br>
            <label>Pasword</label><br>
            <div>
                <input type="password" name="password" class="signup_inputs" id="password">
                <img src="icons/visibility_off_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" id="eye-close" onclick="pass()" class="img-pswd1">
            </div><br>
            <label>Confirm Pasword</label><br>
           <div>
           <img src="icons/visibility_off_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" id="eye-clos" onclick="pas()" class="img-pswd2">
           <input type="password" name="passwordComfirm" class="signup_inputs" id="passwordcn">
           </div><br>
            
         
            <button name="Signup" class="signup_btn">Sign Up</button>
            <p class="signup_p">Already have an account? <a href="login.php"> Login</a> </p>
        </div>
    </form>

    <script>
        
        var a ;
        var b ;
            function pass(){
                  if(a == 1 ) {
                    document.getElementById('password').type="password";
                    document.getElementById('eye-close').src='icons/visibility_off_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png';
                    a = 0;
                  }
                  else{
                        document.getElementById('password').type="text";
                    document.getElementById('eye-close').src='icons/visibility_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png';
                    a =1;
                  }
            }


            function pas(){
                  if(b == 1 ) {
                    document.getElementById('passwordcn').type="password";
                    document.getElementById('eye-clos').src='icons/visibility_off_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png';
                    b = 0;
                  }
                  else{
                        document.getElementById('passwordcn').type="text";
                    document.getElementById('eye-clos').src='icons/visibility_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png';
                    b =1;
                  }
            }

    </script>
</body>
</html>