<!doctype html>
<html>
<!--meg kéne gyógyítani, hogy bejelentkezés előtt és után is működjön a nav link mindenhol, mert bejelentkezés után nem találja őket-->
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

    <script src="js/cart.js"></script>
    <!--<script src="js/listing.js"></script>-->
</body>

</html>



    <div class="container">
        <h1>Termékek</h1>

        <ul id="products">

		<?php
    foreach ($VIEWDATA['products'] as $products){
      echo "<li>";
      echo "<div id='" . $products["id"] . "'>";
			echo "<span>" . $products["itemName"] . "</span>";
      echo "<img id='" . $products["id"] . "' alt='" . $products["itemName"] . "' src='";
      if(!empty($products["picId"])) {
        echo $products["picId"];
      }
      else {
        echo "https://drive.google.com/uc?id=1c0-ie6crNSqFwqo-pwOgvfC2y1HIoTTp";
      }
      echo "' alt='" . $products["itemName"] . "'>";
      echo "<input id='" . $products["id"] . "' type='number' min='1' max='" . $products["quantity"] . "'>";
      echo "<button data-prodid='";
      echo $products["itemName"] . $products["id"];
      echo "'>Kosárba</button>";
      echo "</div>";
      echo "</li>";

		 }
     ?>
        </ul>
    </div>
 <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>

    <script src="js/cart.js"></script>
    <!--<script src="js/listing.js"></script>-->
</body>

</html>
