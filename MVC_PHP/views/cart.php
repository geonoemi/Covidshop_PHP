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
      <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <!-- Table head -->
                <thead>
                  <tr>
                      <th>Termék neve</th>
                      <th>Mennyiség</th>
                      <th>Ár</th>
                      
                  </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <?php
                      include "views/nav.php";
                      if(isset($VIEWDATA["cart"])) {
                        foreach ($VIEWDATA["cart"] as $key) {
                          // csúnya frontend


                          echo "<ul>";
                          echo "<tr>". "<td>" . $key["name"] . "</td>";
                          echo "<td>" . $key["quantity"] . "</td>";
                          echo "<td>".  $key["quantity"] * $key["price"] . "</td>";
                          echo "</ul>";                      
                        }
                      }
                    ?>
                  </tbody>
            </table>

        <button id="checkout">Fizetés </button>
    </body>
</html>
