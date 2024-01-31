<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>change Profile</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="nav">  
    <div class="logo">
      <p> <a href="home.php">  Logo </a></p>

    </div>
    <div class="right-links">
         <a href="#">Change Profile </a>
         <a href="Logout.php"><button class="btn">log Out</button></a>      
    </div>
  </div>
  <div class="container">
    <div class="box form-box">
     <header>change profile</header>
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
 
 
       <div class="field ">
        
         <input type="submit" class="btn" name="submit"    value="Update" required>
         
       </div>
       
 
 
     </form>
    </div>
    </div>  
</body>
</html>