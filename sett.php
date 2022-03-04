<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  $id = $_SESSION['unique_id'];
  $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id='$id'");
  $row = mysqli_fetch_assoc($sql)
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form update">
      <header>
        <img src="./logo.png" alt="">
        <span>Chat System</span>
      </header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" value="<?php echo $row['fname'] ?>" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" value="<?php echo $row['lname'] ?>" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password Check</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Update Now">
        </div>
      </form>
      <div class="link"><p><a href="#" class="btn">Change Profile Picture</a></p><p><a class="btn" href="login.php">Change Password</a></p></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/update.js"></script>

</body>
</html>
