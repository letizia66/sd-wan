      <div class="middle">
         <div class="container">
           <table id="user-list">
             <thead>
               <tr><th>Name</th><th>E-mail</th><th>Policy Id</th></tr>
             </thead>
             <tbody>
             </tbody>
           </table>
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
