<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fizetés</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
    </head>


    <body>
      <div class="table-responsive">
                <!-- Table head -->
                    <?php
                    $fullprice=0;
                      include "views/nav.php";
                      if(isset($VIEWDATA["cart"])) {
                        echo '<table class="table table-bordered table-hover">';
                        echo '<thead>
                        <tr>
                        <th>Termék neve</th>
                        <th>Nettó ár</th>
                        <th>Bruttó ár</th>
                        <th>Mennyiség</th>
                        <th>Bruttó ár összesen</th>
                        </tr>
                        </thead>

                        <tbody>';

                        foreach ($VIEWDATA["cart"] as $key) {
                          if($key["username"]===$_SESSION["username"]){

                            echo "<tr>";
                              echo "<td>" . $key["name"] . "</td>";
                              echo "<td>" . number_format(0.73*$key["price"], 0, ',', ' ') . " Ft</td>";
                              echo "<td>" . number_format($key["price"], 0, ',', ' ') . "</td>";
                              echo "<td>" . $key["quantity"] . "</td>";
                              echo "<td>".  number_format($key["quantity"] * $key["price"], 0, ',', ' ') . " Ft</td>";
                            echo "</tr>";

                          $fullprice += $key["price"] * $key["quantity"];
                        }
                      }

                      $fullprice=number_format($fullprice, 0, ',', ' ');
                      echo "<tr id='order-price-sum'><td>Végösszeg</td>";
                      echo "<td></td><td></td><td></td><td>" . $fullprice . " Ft</td></tr></tbody>
                </table>";
                      echo "<button name='checkout' type='submit' form='order'>Fizetés</button>";
                      }

                      else {
                        echo "<span class='error'>Jelenleg a kosár üres.</span>";
                      }
                    ?>






        <form id="order" action="?c=cart" method="post">


        </form>
    </body>
</html>
