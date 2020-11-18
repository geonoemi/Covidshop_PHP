<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék hozzáadása</title>

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
                <a href="index.html">Kezdőlap</a>
            </li>
            <li class="nav-item active">
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
        <form id="addproduct" method="GET" action="addproduct.html">
            <div class="input-wrapper">
                <label class="text-primary">Termék neve</label>
                <input class="text-input" type="text" name="name" ><br>
            </div>

            <div class="input-wrapper">
                <label class="text-primary">Darabszám</label>
                <input class="text-input" type="text" name="quantity" ><br>
            </div>

            <div class="input-wrapper">
                <label class="text-primary">Cikkszám</label>
                <input class="text-input" type="text" name="prodid" ><br>
            </div>

            <div class="input-wrapper">
                <label class="text-primary">Ár</label>
                <input class="text-input" type="text" name="price" ><br>
            </div>

            <div class="input-wrapper">
                <label class="text-primary">Termékleírás</label>
                <textarea name="description" rows="6" ></textarea><br>
            </div>

            <div class="input-wrapper">
                <label class="text-primary">
					Fénykép linkje
					<b title="Ide másolhatja egy google driveban tárolt fotó nyilvános megosztási linkjét!">
						&#128712;
					</b>
				</label>
                <input class="text-input" type="text" name="picid" ><br>
            </div>

            <br>

			<div>
				<i>
					Álltalunk előre létrehozott termékek importálásához kérem kattintson 
					<span style="color:orange;" id="restore">IDE</span>!(FIGYELEM, az álltalad már létrehozott termékek törlésre kerülnek)
				</i>
			</div>
            <input class="btn submit-btn" type="submit" value="Elküld">
        </form>
    </div>


    <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>

    <script src="./js/cart.js"></script>
    <script src="./js/addProduct.js"></script>
    <script src="./js/importProducts.js"></script>
</body>

</html>
