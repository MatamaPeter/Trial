<?php
include ("config.php");

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con -> prepare("SELECT * FROM users WHERE email= ?");
    $stmt -> bind_param("s", $username);
    $stmt -> execute();
    $check_user = $stmt -> get_result();

    if ($check_user -> num_rows !== 0){
        $user_data = $check_user -> fetch_assoc();
        $hashed_password = $user_data['Password'];

        if (password_verify($password, $hashed_password)){

            $_SESSION['user'] = $user_data['Firstname'];
            $_SESSION['email'] = $user_data['Email'];
            header("location:Homepage.php");
            exit();
        }else{
            echo"Wrong Password";
        }
        
    }else{
        echo "User does not exist";
    }
}else{


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Ubunifu MIS Login</title>
</head>
<body>
    <form action="" method="post">
        <div class="avatar">O</div>
        <div class="f_title">Ubunifu MIS</div>
        <input type="email" name="username" id="" placeholder="Enter your email...">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="submit" value="Login" name="login">
        <div class="f_below"><div class="f_pword">Forgot Password?</div> 
        <div class="S_up"><a href="Register.php">Sign Up</a></div> 
        </form></div> 
</body>
</html>
<?php } ?>
