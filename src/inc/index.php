<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/asset/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="/asset/Buttons-1.6.2/css/buttons.dataTables.min.css"/>
    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/asset/datatables.min.js"></script>
    <script type="text/javascript" src="/asset/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <?php if (is_admin()) { ?>
          <script type="text/javascript" src="/js/admin.js"></script>
    <?php } else { ?>
          <script type="text/javascript" src="/js/customer.js"></script>
    <?php } ?>
  </head>
  <body>
    <div class="bgimg">
      <div class="topleft">
        <img src="images/logo.png" style="width: 150px">
      </div>
        <?php
        if (is_admin()) {
          include "admin.php";
        } else {
          include "customer.php";
        }
        ?>
      <div class="bottomleft">
        <p>Welcome <?php echo $_SESSION['name']; ?></p>
      </div>
      <div class="bottomright">
        <form action="logout.php" method="POST">
          <button type="submit">Logout</button>
        </form>
      </div>
    </div>
</html>
