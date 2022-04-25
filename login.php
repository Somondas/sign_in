<!-- main -->
<?php
session_start();
include 'dbconection.php';
 ?>

<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['pswd'];
  $email_search = "select * from sign_up_data where email = '$email'";
  $query = mysqli_query($connect, $email_search);
  $email_count = mysqli_num_rows($query);
  if ($email_count) {
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass = $email_pass['password'];
    $pass_decode =  password_verify($password, $db_pass);
    $_SESSION['username'] = $email_pass['name'];
    if ($pass_decode) {
      ?>
      <script>
        alert("Login sucessful!!")
        location.replace('home.php');
      </script>
      <?php
    }else {
      ?>
      <script>
        alert("Password incorrect")
      </script>
    <?php
    }
  }else {
    echo "Invalid Email";
  }

}

 ?>
