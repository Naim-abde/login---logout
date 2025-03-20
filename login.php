<?php 
 include 'conn.php';
 $create = "";
 if(isset($_POST['submit'])){
     $email = $_POST['email'];
     $password = $_POST['password'];
 
      $query = "SELECT password FROM log WHERE email = '$email'";
     $result = mysqli_query($conn, $query);
 
     if(mysqli_num_rows($result) == 1){
         $row = mysqli_fetch_assoc($result);
         $hashed_password = $row['password'];
 
          if(password_verify($password, $hashed_password)){
             header("Location: home.php");
             exit();
           } 
         else {
            $create = '<h2 style="background-color:red; color:white; border-radius:10px; padding:10px;" id="cr">
                    Incorrect email or password.
                   </h2>';
              }
     }  
 }
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="cs">
    <title>Contactez-nous</title>
    <style>
        body{
    background-color: rgba(128, 128, 128, 0.705);
}

form.contact{
    width: 500px;
    display: block;
    height: 450px;
    background-color: white;
    position: relative;
    left: 500px;
    border-radius: 25px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
    
    top: 50px;
    padding: 40px;
}
input,textarea{
    display: block;
    margin-left: 6px;
    width: 99%;
    margin-top: 10px;
    margin-bottom: 20px;
}
input{
    height: 30px;
}
textarea{
    height: 100px;
    margin-bottom: 20px;
}
label{
    margin-bottom: 20px;
    margin-top: 10px;
    font-size: larger;
    font-weight: bold;
}
.create{
    margin-top: 10px;
    
    background-color: rgb(17, 233, 86);
    border: none;
    margin-bottom: 30px;
    width: 100px;
    height: 29px;
    border-radius:2px ;
}
    </style>
</head>
<body>
    <form class="contact" method="post" action="login.php">
        <div class="card">
            <h1 class="title">Log In</h1>
            <label for="Email">Email : </label>
            <input type="email" name="email" id="Email">
            <label for="sujet">Password : </label>
            <input type="password" name="password" id="sujet">
            <input type="submit" name="submit" value="Create" class="create">
            <a href="index.php">Log out</a>
            <?php echo $create; ?> <!-- عرض الرسالة -->
        </div>
    </form>
</body>
</html>
