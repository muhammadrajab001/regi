<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
   <div class="box form-box">


   <?php 
   
    include("php/config.php");
    if(isset ($_POST["sumbit"])){

      $username = $_POST["username"];
      $password = $_POST["password"];
      $email = $_POST["email"];
      $age = $_POST["age"];

      $verify_query = mysqli_query($conn,"SELECT Email FROM users WHERE Email='$email'");
      if(mysqli_num_rows($verify_query) != 0){
        echo "<div class='message'>
         <p>This email is used, Try </p>
          </div> <br>"
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>"
    
    }
    
  else{
   mysqli_query($conn,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");
  
   echo "<div class='message'>
         <p>Registeration successfully</p>
          </div> <br>"
            echo "<a href='index.php'><button class='btn'>Login Now </button> "
    
    }
  
  }else{

  
   
   ?>
    <header>Sign up</header>
    <form action="" method="post">


      <div class="field input">
        <label for="email">username</label>
        <input type="text" name="username" id="username" autocomplete="off" required>
        
      </div>

      <div class="field input">
        <label for="email">email</label>
        <input type="text" name="email" id="email" autocomplete="off" required>
        
      </div>


      <div class="field input">
        <label for="age">Age</label>
        <input type="number" name="age" id="age"  autocomplete="off" required>
      </div>

      <div class="field input">
        <label for="password">password</label>
        <input type="password" name="password" id="password" autocomplete="off"  required>
      </div>
   

      <div class="field ">
       
        <input type="submit" class="btn" name="submit"    value="Login" required>
        
      </div>
      

      <div class="links">

        Already a member  ? <a href="index.html">Sign In</a>
      </div>

    </form>
   </div>

   <?php } ?>
   </div>  
</body>
</html>