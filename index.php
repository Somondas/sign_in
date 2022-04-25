<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "dbconection.php"; ?>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">

                <input type="password" name="password" placeholder="Password" required="">
                <input type="password" name="cpassword" placeholder="Retype Password" required="">
                <button  type="submit" name='submit'>Sign up</button>
            </form>
        </div>

        <div class="login">
            <form action="login.php" method="post">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button type="submit" name='submit'>Login</button>
            </form>
        </div>
    </div>
    <?php
  if (isset($_POST['submit'])) {
    $name =mysqli_real_escape_string($connect, $_POST['name']);
    $email =mysqli_real_escape_string($connect, $_POST['email']);
    $password =mysqli_real_escape_string($connect, $_POST['password']);
    $cpassword =mysqli_real_escape_string($connect, $_POST['cpassword']);
    // password encryption----
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    // form validation-------------
    $emailquery = "select * from sign_up_data where email	 = '$email'";
    $query = mysqli_query($connect, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount > 0){
      ?>
      <script>
        alert("data inserted")
      </script>
      <?php
    }else{
      if($password === $cpassword){
        $insertquery = "insert into sign_up_data(	name,	email,	password,	cpassword) values('$name','$email','$pass', '$cpass')";
        $inserted = mysqli_query($connect, $insertquery);

      }else{
        echo "password are not matchings..";
      }
    }


}
   ?>
</body>

</html>
