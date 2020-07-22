<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/asset/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="/asset/Buttons-1.6.2/css/buttons.dataTables.min.css"/>
    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/asset/datatables.min.js"></script>
    <script type="text/javascript" src="/asset/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/js/admin.js"></script>
  </head>
  <body>
    <div class="bgimg">
      <div class="topleft">
        <img src="images/logo.png" style="width: 150px">
      </div>
      <div class="middle">
         <div class="container">
           <table id="user-list">
             <thead>
               <tr><th>Id</th><th>Name</th><th>E-mail</th><th>Policy Id</th></tr>
             </thead>
             <tbody>
             </tbody>
           </table>
         </div>
      </div>
      <div class="bottomleft">
        <p>Welcome <?php echo $_SESSION['name']; ?></p>
      </div>
    </div>
    <div class="modal-dialog" id="create-user">

        <form action="users.php" method="POST">
          <div class="container">
            <span class="close">&times;</span>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required><br/>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required><br/>

            <label for="email"><b>E-mail address</b></label>
            <input type="text" placeholder="Enter E-mail address" name="email" required><br/>

            <label for="deviceid"><b>Policy Id</b></label>
            <input type="text" placeholder="Enter Policy Id" name="policyid" required><br/>

            <button type="submit">Create</button>

          </div>
        </form>
    </div>
</html>
