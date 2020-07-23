
      <div class="middle">
         <div class="container">
           <table id="fw-list">
             <thead>
               <tr><th>Id</th><th>Action</th><th>Source IP</th><th>Source Port</th><th>Destination IP</th><th>Destination Port</th></tr>
             </thead>
             <tbody>
             </tbody>
           </table>
         </div>
       </div>
         <div class="modal-dialog" id="add-fw">

             <form action="firewall.php" method="POST">
               <div class="container">
                 <span class="close">&times;</span>
                 <label for="action"><b>Action</b></label>
                 <input type="text" placeholder="Enter Action" name="action" required><br/>

                 <label for="sourceip"><b>Source IP</b></label>
                 <input type="text" placeholder="Enter Source IP" name="sourceip" required><br/>

                 <label for="sourceport"><b>Source Port</b></label>
                 <input type="text" placeholder="Enter Source Port" name="sourceport" required><br/>

                 <label for="destinationip"><b>Destination IP</b></label>
                 <input type="text" placeholder="Enter Destination IP" name="destinationip" required><br/>

                 <label for="destinationport"><b>Destination Port</b></label>
                 <input type="text" placeholder="Enter Destination Port" name="destinationport" required><br/>

                 <button type="submit">Create</button>

               </div>
             </form>
         </div>
