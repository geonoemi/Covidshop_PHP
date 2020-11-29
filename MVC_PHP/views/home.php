<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kezdolap</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
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
                        echo "<div id='". $products["id"] . "'>";
                        echo "<span>" . $products["itemName"] . "</span>";
                        echo "<img alt='" . $products["itemName"] . "' src='";
                        echo "https://drive.google.com/uc?id=" . $products["picId"];
                        echo "' alt='" . $products["itemName"] . "'>";
                        echo "<span class='productPrice'>" . $products["price"] . "</span>";
                        echo "<input id='" . $products["itemName"] ."". $products["id"] . "' type='number' min='1' value='1' max='" . $products["quantity"] . "'>";
                        echo "<button class='addtocart' data-prodid='" . $products["itemName"] ."". $products["id"] . "' > Kosárba </button>";
                        echo "</div>";
                        echo "</li>";
                    }
                ?>
            </ul>
        </div>
        <div class="contact-us-wrapper">
                <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
        </div>

    </body>

</html>
