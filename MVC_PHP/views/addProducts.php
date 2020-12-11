<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék hozzáadása</title>

    <script src="./js/cart.js"></script>
    <script src="./js/addProduct.js"></script>
    <script src="./js/importProducts.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/interfaceupdate.css">
</head>

<body>
<?php include "views/nav.php"?>
    <div class="container">
        <form id="addproduct" method="post" action="index.php?c=addProducts" enctype="multipart/form-data">
            <div class="input-wrapper">
                <label class="text-primary">Termék neve</label>
                <input class="text-input" type="text" name="name" ><br>
            </div>

            <div class="inpt-wrapper">
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
              <label class="text-primary">Kép</label>
              <input name="picfile" type="file"><br>
            </div>
            <div class="input-wrapper">
                <label class="text-primary">
					Fénykép linkje
					<b title="Google driveban tárolt fotó linkje">
						&#128712;
					</b>
				</label>
                <input class="text-input" type="text" name="picid" ><br>
            </div>

            <br>

			<!--div>
				<i>
					Általunk előre létrehozott termékek importálásához kérem kattintson
					<span style="color:orange;" id="restore">IDE</span>!(FIGYELEM, az álltalad már létrehozott termékek törlésre kerülnek)
				</i>
			</div-->
            <input class="btn submit-btn" type="submit" value="Elküld">
        </form>
    </div>


    <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>

</body>

</html>
