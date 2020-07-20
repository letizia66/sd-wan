<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    <div class="bgimg">
      <div class="topleft">
        <img src="images/logo.png" style="width: 150px">
      </div>
      <div class="middle">
        <form action="/authenticate.php" method="post">
         <div class="container">
           <label for="uname"><b>Username</b></label>
           <input type="text" placeholder="Enter Username" name="uname" required><br/>

           <label for="psw"><b>Password</b></label>
           <input type="password" placeholder="Enter Password" name="psw" required><br/>

           <button type="submit">Login</button><br/>
           <label>
             <input type="checkbox" checked="checked" name="remember"> Remember me
           </label>
         </div>

        </form>
        <p class="psw">Forgot <a href="#">password?</a></p>

      </div>
      <div class="bottomleft">
        <p>This is a demo</p>
      </div>
    </div>
</html>
