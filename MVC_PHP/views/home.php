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
    <nav class="app-header">
        <div class="app-header-name">
            <p class="company-name">Pandémia kft. Webshop</p>
            <p class="company-slogan">- A járványügyi segédeszközök szakértõje</p>
        </div>
        <ul class="app-header-nav-links">
            <li class="nav-item active">
                Üdvözöljük, <?php echo $VIEWDATA['userdata']['name']; ?>
            </li>

            <li class="nav-item active">
                <a href="index.html">Kezdőlap</a>
            </li>
            <li class="nav-item">
                <a href="addproduct.html">Új termék</a>
			</li>
            <li class="nav-item">
                <a href="products.html">Keresés</a>
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
			
			</div>
			
			<div class="cart-content-wrapper checkout-wrapper">
				<button id="checkout"> Fizetés! </button>
			</div>
		</div>
    </nav>

    <div class="container">
        <h1>Termékek</h1>

        <ul id="products">

		<?php foreach ($VIEWDATA['products'] as $prodName){ ?>

			<li>
				<?php echo $prodName; ?>
			</li>

		<?php } ?>
        </ul>
    </div>
 <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>

    <script src="js/cart.js"></script>
    <script src="js/listing.js"></script>
</body>

</html>