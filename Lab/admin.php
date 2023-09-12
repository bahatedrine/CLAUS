<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Admin Log In</title>
</head>

<body>
    <div class="formBox">
        <h1>Admin Login</h1>
        <form action="func.php" method="post" >
            <div class="input-container">
                <input type="text" placeholder="Enter your username" name="username" class="box1" required>
                <img src="icon/user.png" class="input-icon">
            </div>
            <div class="input-container">
                <input type="password" placeholder="Enter your password" name="password" class="box2" required>
                <img src="icon/lock.png" class="input-icon">
            </div>
            <input type="submit" value="Login" class="submit" name="adminLog">
        </form>
    </div>



<footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="#" class="logo d-flex align-items-center">


      </div>

    </div>
  </div>
</div>
</footer>
    <div class="footer-legal" style="
     color: #ffffff;
    position: fixed;
    bottom: 5%;
    left: 50%;
    transform: translateX(-50%);
    ">
         <p class="copyright">
          Copyright &copy; <script>
          var today = new Date();
          document.write(today.getFullYear());
          </script>
          <strong><span>C_LAB </span></strong>. All Rights Reserved 
          
       </p>
          <p id="copy"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Designed by C_LAB &trade;</p>
    </div>
    </div>

</body>

</html>
