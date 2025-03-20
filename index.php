<?php  
 include 'conn.php';
 $create = "";
 if(isset($_POST['submit'])){
     $user = $_POST['user'];
     $email = $_POST["email"];
     $password = $_POST["password"];

      $check_query = "SELECT * FROM log WHERE email = '$email'";
     $check_result = mysqli_query($conn, $check_query);

     if(mysqli_num_rows($check_result) > 0){
         $create = '<h2 style="background-color:red; color:white; border-radius:10px; padding:10px;">البريد الإلكتروني موجود بالفعل</h2>';
     } else {
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          $query = "INSERT INTO log (user, email, password) VALUES ('$user', '$email', '$hashed_password')";

         if(mysqli_query($conn, $query)){
             $create = '<h2 style="background-color:green; color:white; border-radius:10px; padding:10px;">تم التسجيل بنجاح!</h2>';
         } else {
             $create = '<h2 style="background-color:red; color:white; border-radius:10px; padding:10px;">حدث خطأ أثناء التسجيل</h2>';
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
    <title>Contactez-nous</title>
</head>
<body>
    <form class="contact" method="post" action="index.php">
        <div class="card">
        <h1 class="title">Contactez-nous</h1>
        <label for="Nom">Nom : </label>
        <input type="text" name="user" id="Text">
        
        <label for="Email">Email : </label>
        <input type="email" name="email" id="Email">
        <label for="sujet">Password : </label>
        <input type="password" name="password" id="sujet">
        <input type="submit" name="submit" value="Create" class="create">
        <a href="login.php">Login</a>
        <?php echo $create ?>
        </div>
    </form>
</body>
</html>
