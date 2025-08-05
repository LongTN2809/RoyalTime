<?php
  session_start();
 if(isset($_SESSION['checkDuplicateName'])){
     $checkName = $_SESSION['checkDuplicateName'];

 }
 if(isset($_SESSION['checkDuplicatePass'])){
     $checkPass = $_SESSION['checkDuplicatePass'];
 }
 unset($_SESSION['checkDuplicateName']);
 unset($_SESSION['checkDuplicatePass']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
      
        <div class="wrapper active" id="loginForm">
         <form action="Process_Login.php" method="post" >
             <h2>Login</h2>
             <div class="input-box">
              <input type="text" name="username" id="" placeholder="Username"  required>
              <i class="fa-solid fa-user user"></i>
              <p class="notice"></p>
             
             </div>
             <div class="input-box">
              <input type="password" name="userpass" id="" placeholder="Password"  required>
              <i class="fa-solid fa-eye-slash eye-close"></i>
              <p class="notice"></p>
             
             </div>
             <div class="remember-forgot">
              <label for=""><input type="checkbox" name="rmb" id="">Remember me</label>
              <a href="#">Forgot password?</a>
             </div>
             <div class="login-box">
                     <button class="btn" name="login" value="login" type="submit">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Login
                    </button>
             </div>
             <div class="register">
              <p>Don't have account?<a href="#" onclick="showRegister()">Register</a></p>
             </div>
            
         </form>
    </div>

    <div class="wrapper" id="registerForm">
         <form action="Process_Login.php" method="post">
             <h2>Register</h2>
             <div class="input-box">
             
              <input type="text" name="username" id="" placeholder="Username"  required>
              <i class="fa-solid fa-user user"></i>
              <p class="notice"></p>
             </div>
             <div class="input-box">
              <input type="password" name="userpass" id="" placeholder="Password"  required>
              <i class="fa-solid fa-eye-slash eye-close"></i>
              <p class="notice"></p>
             </div>
             <div class="input-box">
              <input type="email" name="useremail" id="" placeholder="Email" required>
              <i class="fa-solid fa-envelope email"></i>
              <p class="notice"></p>
              
             </div>
             <div class="remember-forgot">
              <label for=""><input type="checkbox" name="rmb" id="">Remember me</label>
              <a href="#">Forgot password?</a>
             </div>
             <div class="login-box">
                    <button class="btn" name="register" value="Register" type="submit">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         Register
                  </button>
             </div>
             <div class="register">
              <p>Do you have account?<a href="#" onclick="showLogin()">Login</a></p>
             </div>
         </form>
    </div>
    <script src="./Login.js">
    </script>
    <script>
   const checkName = <?php echo json_encode($checkName) ?>;
   const checkPass = <?php echo json_encode($checkPass) ?>;
   const form = document.querySelector("form");
   const notices = form.querySelectorAll(".notice");
   document.addEventListener("DOMContentLoaded" , function(){
        document.querySelector('[name="username"]').classList.remove('warning');
        document.querySelector('[name="userpass"]').classList.remove('warning');
        notices.forEach(function(notice){
         notice.innerText = "";
    });
      if(checkName == false){
      document.querySelector('[name="username"]').classList.add('warning');
      notices[0].innerText = "Name is uncorrect!";
   }
   if(checkPass == false){
      document.querySelector('[name="userpass"]').classList.add('warning');
      notices[1].innerText = "Password is uncorrect!";
       notices[1].style.top = 55 + "px";
   }
   });
  
    </script>
</body>
</html>