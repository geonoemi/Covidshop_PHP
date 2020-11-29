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
                      <th>Nettó ár</th>
                      <th>Bruttó ár</th>
                      <th>Mennyiség</th>
                      <th>Bruttó ár összesen</th>  
                  </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <?php
                    $fullprice=0;
                      include "views/nav.php";
                      if(isset($VIEWDATA["cart"])) {
                        foreach ($VIEWDATA["cart"] as $key) {
                          
                          echo "<ul>";
                            echo "<tr>";
                              echo "<td>" . $key["name"] . "</td>";
                              echo "<td>" . number_format(0.73*$key["price"], 0, ',', ' ') . "</td>";
                              echo "<td>" . $key["price"] . "</td>";
                              echo "<td>" . $key["quantity"] . "</td>";
                              echo "<td>".  number_format($key["quantity"] * $key["price"], 0, ',', ' ') . "</td>";
                            echo "</tr>";
                          echo "</ul>"; 
                          $fullprice += $key["price"] * $key["quantity"];                     
                        }
                      }
                    ?>
                  </tbody>
            </table>
        <?php 
        $fullprice=number_format($fullprice, 0, ',', ' ');
        echo "Végösszeg: $fullprice" . " Ft";?>
        <button id="checkout">Fizetés </button>
    </body>
</html>
