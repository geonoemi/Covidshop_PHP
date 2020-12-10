<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kezdolap</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/interfaceupdate.css">
        <script src="js/cart.js"></script>
        
    </head>

    <body>
        <?php include "views/nav.php"?>

        <div class="container">
            <h1>Termékek</h1>

            <ul id="products">

                <?php
                    foreach ($VIEWDATA['products'] as $products){
                        echo "<li>";
                            echo "<div class='item' id='". $products["id"] . "'>";
                                echo "<span>" . $products["itemName"] . "</span>";
                                echo "<img alt='" . $products["itemName"] . "' src='";
                                echo "https://drive.google.com/uc?id=" . $products["picId"];
                                echo "' alt='" . $products["itemName"] . "'>";
                                echo "<span class='productPrice'>" . $products["price"] /*number_format($products["price"], 0, ',', ' ')*/ . " Ft</span>";
                                echo "<input id='" . $products["itemName"] ."". $products["id"] . "' type='number' min='1' value='1' max='" . $products["quantity"] . "'>";
                                echo "<button id='add-to-cart' class='addtocart' data-prodid='" . $products["itemName"] ."". $products["id"] . "' > Kosárba </button>";
                            echo "</div>";
                        echo "</li>";
                    }
                ?>
            </ul>
        </div>
        <div class="contact-us-wrapper">
            <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
        </div>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
        <script src="js/flytocart.js"></script>
         
        
    </body>

</html>
