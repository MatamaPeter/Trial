<?php
include ("config.php");

if (isset($_POST['register'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone = $_POST['Phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


$stmt = $con -> prepare("SELECT * FROM users WHERE Email = ?");
$stmt -> bind_param("s", $email);
$stmt -> execute();
$validate_user = $stmt -> get_result();

if ($validate_user -> num_rows > 0) {
    echo "Email already exists";
    } else {
        $stmt = $con -> prepare("INSERT INTO users (Firstname, Lastname, Email, Phone, Password)
        VALUES (?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssss", $firstname, $lastname, $email, $phone, $hashed_password);
        $stmt -> execute();
        
        echo "User created";

    }


}else{




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Ubunifu MIS Register</title>
</head>
<body>
    <form action="" method="post">
        <div class="avatar">O</div>
        <div class="f_title">Ubunifu MIS</div>
        <div class="input_fields">
        <input type="text" name="fname" id="" placeholder="Firstname">
        <input type="text" name="lname" id="" placeholder="Lastname">
        <input type="tel" name="Phone" id="" placeholder="Mobile No.">
        <input type="email" name="email" id="" placeholder="Email">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="password" name="Cpassword" id="" placeholder="Confirm password">
        </div>
        <input type="submit" name="register" value="Register">
        
        <div class="f_below"><div class="f_register">Already Registered?</div> 
        <div class="S_up"><a href="Index.php">Sign in</a></div> 
        </form></div> 
</body>
</html>
<?php } ?>