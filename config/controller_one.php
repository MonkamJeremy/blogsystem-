<?php
//initialling
session_start();
require_once 'connet.php';
$errors=array();
$name="";
$email="";
$password="";



//checking if user click on the sign up button
if(isset($_POST['Signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordcomfirm=$_POST['passwordComfirm'];


    //checking errors  and validation
    if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
        $errors["name"]="Only letter and whitespace allowed";
    }

    if (empty($name)) {
        $errors["name"]="Username required";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["email"]="This email is invalid"; 
    }
    if (empty($email)) {
        $errors["email"]="Email required";
    }
    if (empty($password)) {
        $errors["password"]="Password required";
    }
    if ($password !== $passwordcomfirm) {
        $errors["password"]="The two passwords do not match";
    }

    //checking if emial already exit in the database
    $emailquery="SELECT * FROM user_account WHERE user_email= $email";
    $result= $conn->query($emailquery );
    //$stmt = $conn->prepare(($emailquery));
    //$stmt->bind_param('s',$email);
    //$stmt->execute();
    //$result = $stmt->get_result();
    //$usercount = $result->num_rows;
    if($result->num_rows > 0){
        $errors["user_email"]="Email already exist";
    }
    //$result->close();

    
    if(count($errors)=== 0){
        $option=[
            'cost'=>12
        ];
        $hashpassword=password_hash($password,PASSWORD_BCRYPT,$option);
       
      
        $sql="INSERT INTO user_account(user_name,user_email,user_password) VALUES(?,?,?)";
        $stmt=$conn->prepare(($sql));
        $stmt->bind_param("sss",$name, $email, $hashpassword);

       if($stmt->execute()) {
                  //sign  in user
        $user_id=$conn->insert_id;
        $_SESSION["id"]=$user_id;
        $_SESSION["user_name"]=$name;
        $_SESSION["user_email"]=$email;
              // send message to the user
        //$_SESSION["message"]="Sign Up Sucessfully";
        header("location:index.php");
        exit();
       }else{
        $errors['db_error']="Database error: failed to sign up";
       }
    }
}