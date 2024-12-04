<?php
require_once 'controller_1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <input type="password" name="password" class="signup_inputs"><br><br>
            <label>Confirm Pasword</label><br>
            <input type="password" name="passwordComfirm" class="signup_inputs"><br><br>
            <button name="Signup" class="signup_btn">Sign Up</button>
            <p class="signup_p">Already have an account? <a href="login.php"> Login</a> </p>
        </div>
    </form>
</body>
</html>