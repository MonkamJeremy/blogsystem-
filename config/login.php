<?php
require_once 'controller_1.php';
//require_once 'functtions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/png" href="icons/favicon.png">
    <title>Login</title>
    <link rel="stylesheet" href="controller.css">
</head>
<body>
     <h2 class="login_h2">BlogZone</h2>
    <form method="post" action="login.php" class="login_form">
        <div class="login_legend_div">
          <legend class="login_legend">Login</legend><br><br>
        </div>
        <?php  if(count($errors) > 0):?>
        <div class="login_alert">
            <?php foreach($errors as $error):?>
            <li><?php echo $error;?></li>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
         
        <div class="login_form_div">
            <label>Email</label><br>
            <input type="text" name="email"  class="login_input" value="<?php echo $email;?>" ></input><br><br>
            <label>Pasword</label><br>
            <div>
                <input type="password" name="password" class="signup_inputs" id="password">
                <img src="icons/visibility_off_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="" id="eye-close" onclick="pass()" class="img-pswd1lgn">
            </div><br>
            <li class="login_li"><a href="#">Forgot Password?</a></li>
            <button name="login" class="login_btn">Login</button>
            <p class="login_p">Don't yet have an account? <a href="signup.php"> Sign Up</a> </p>
        </div>
    </form>
    <script>
        var a;
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
    </script>
</body>
</html>