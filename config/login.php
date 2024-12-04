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
            <input type="text" name="password" class="login_input"><br><br>
            <li class="login_li"><a href="#">Forgot Password?</a></li>
            <button name="login" class="login_btn">Login</button>
            <p class="login_p">Don't yet have an account? <a href="signup.php"> Sign Up</a> </p>
        </div>
    </form>
</body>
</html>