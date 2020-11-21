<!--<?php echo $VIEWDATA['products']; ?>-->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Produkciók
    </title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<?php include "views/nav.php"?>

    <form id="addproduct" method="GET" action="index.php">
        <input type="text" name="inpText" value="" placeholder="Pl. cicabajszos szájmaszk">
        <input type="hidden" name="c" value="products">
        <input class="btn submit-btn" type="submit" value="Keresés">
    </form>

    <div class="container">

          <?php
          if(isset($_GET["inpText"]) && !empty($_GET["inpText"])) {
            echo "<h1 id='resList'>Találatok:</h1>";

            echo "<ul id='products'>";
            if(!empty($VIEWDATA['products'])) {
              foreach ($VIEWDATA['products'] as $products){
                echo "<li>";
                echo "<div id='" . $products["id"] . "'>";
          			echo "<span>" . $products["itemName"] . "</span>";
                echo "<img id='" . $products["id"] . "' alt='" . $products["itemName"] . "' src='";
                echo "https://drive.google.com/uc?id=" . $products["picId"];
                echo "' alt='" . $products["itemName"] . "'>";
                echo "<span>" . $products["price"] . "</span>";
                echo "<input id='" . $products["id"] . "' type='number' min='1' value='1' max='" . $products["quantity"] . "'>";
                echo "<button class='addtocart' data-prodid='" . $products["itemName"] ."". $products["id"] . "' > Kosárba </button>";
                echo "</div>";
                echo "</li>";

          		 }
            }
            else echo "<span class='error'>Nem található a keresésnek megfelelő termék az adatbázisunkban!</span>";


        }
      ?></ul>

    </div>


    <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--<script src="js/cart.js"></script>-->
    <script src="js/carttest.js"></script>
    <!--script src="js/searchProducts.js"></script>
    <script src="js/listing.js"-->
    </script>

</body>



</html>
