<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fizetés</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
    </head>


    <body>
      <ul>
        <?php
        include "views/nav.php";
        if(isset($VIEWDATA["cart"])) {
        foreach ($VIEWDATA["cart"] as $key) {
          // csúnya frontend
          echo "<li>" . $key["name"] . "</li>";
          echo "<li>" . $key["quantity"] . "</li>";
          echo "<li>" . $key["quantity"] * $key["price"] . "</li>";
        }
      }
        ?>
        <ul>
        <button id="checkout">Fizetés </button>
        <script src="js/cart.js"></script>
    </body>
</html>
