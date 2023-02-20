<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require("connect.php"); ?>
    <meta charset="utf-8" />
    <title>Noteify: Login</title>
    <link rel="stylesheet" href="signup.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/b01ebee570.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Noteify</div>
        <div class="title signup">Noteify</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked />
          <input type="radio" name="slide" id="signup" />
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form method="post" action="login.php" class="login">
            <div class="field">
              <i class="fa-solid fa-user"></i>
              <input type="text" name="user" placeholder="Username" required />
            </div>
            <div class="field">
              <i class="fa-solid fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="pass-link"><a href="#">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login" />
            </div>
            <div class="signup-link">
              Not a member? <a href="">Signup now</a>
            </div>
          </form>
          <form method="post" action="signup.php" class="signup">
            <div class="field">
              <i class="fa-solid fa-user"></i>
              <input type="text" name="user" placeholder="Username" required />
            </div>
            <div class="field">
              <i class="fa-solid fa-envelope"></i>
              <input type="email" name="email" placeholder="Email Address" required />
            </div>
            <div class="field">
              <i class="fa-solid fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="field">
              <i class="fa-solid fa-lock"></i>
              <input type="password" name="cpassword" placeholder="Confirm password" required />
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Sign up" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = () => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      };
      loginBtn.onclick = () => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      };
      signupLink.onclick = () => {
        signupBtn.click();
        return false;
      };
    </script>
    <?php
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if ($password == $cpassword)
        {
          $sql = "INSERT INTO Users(Username, Email, Password_hash) VALUES('$user', '$email', '$hash')";
          $result = $conn->query($sql);
          if (!$result)
            echo "Cannot insert: " . $conn->error;
        }
        else
          echo '<br><span style="color: red">Passwords do not match!</span>';
    ?>
  </body>
</html>
