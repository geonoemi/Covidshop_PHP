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
<nav class="app-header">
        <div class="app-header-name">
            <p class="company-name">Pandémia kft. Webshop</p>
            <p class="company-slogan">- A járványügyi segédeszközök szakértõje</p>
        </div>
        <ul class="app-header-nav-links">
            <li class="nav-item">
                <a href="index.php?c=login">Bejelentkezés</a>
            </li>
            <!--ha bejelentkezett, a bejelentkezés li-nek kéne átalakulnia erre
              li class="nav-item active">
                Üdvözöljük, <?php ?>
            </li-->

            <li class="nav-item active">
                <a href="index.php">Kezdőlap</a>
            </li>
            <li class="nav-item">
                <a href="index.php?c=addProducts">Új termék</a>
			</li>
            <li class="nav-item">
                <a href="index.php?c=products">Keresés</a>
            </li>
            
			<li id="showCart" class="nav-item nav-item-cart">
                <img src="shopping-cart.svg">
            </li>
        </ul>
		<div id="cart">
			<div class="cart-content-wrapper">
				<h2>Kosár</h2>
			</div>
			<div id="cartWrapperItems" class="cart-content-wrapper">

			</div>$products.append($row);

			<div class="cart-content-wrapper checkout-wrapper">
				<button id="checkout"> Fizetés! </button>
			</div>
		</div>
    </nav>


    <form id="addproduct" method="GET" action="index.php">
        <input type="text" name="inpText" value="" placeholder="Pl. cicabajszos szájmaszk">
<!-- gecicsöves megoldás, majd kitalálok rá valami mást, de egyelőre jóvanazúgy-->
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
                echo $products["picId"];
                echo "' alt='" . $products["itemName"] . "'>";
                echo "<input id='" . $products["id"] . "' type='number' min='1' max='" . $products["quantity"] . "'>";
                echo "<button data-prodid='" . $products["itemName"] ."". $products["id"] . "' > Kosárba </button>";
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
    <script src="js/cart.js"></script>
    <!--script src="js/searchProducts.js"></script>
    <script src="js/listing.js"-->
    </script>

</body>



</html>
