<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdolap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    </script>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<!doctype html>
<html>
<body>
<?php include "views/nav.php"?>
    <!--div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
                <h2>Bejelentkezés</h2>
                <form action="index.php?c=login" method="post">
                    <div class="form-group">
                        <label>Felhasználónév</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jelszó</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="btnLogin">Login</button>
                </form>
            </div>
        </div>
        </div>
    </div-->


 <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>

<!--    <script src="js/cart.js"></script>-->
    <!--<script src="js/listing.js"></script>-->
</body>

</html>



    <div class="container">
        <h1>Termékek</h1>

        <ul id="products">

		<?php



    foreach ($VIEWDATA['products'] as $products){
        //echo "<img src=https://drive.google.com/uc?id=1sU71LaF_uveO5KSMLp71YJnfFXSmaaxO>";
        echo "<li>";
        echo "<div>";
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

    <!--<script src="js/cart.js"></script>-->
    <!--<script src="js/listing.js"></script>-->
</body>

</html>
