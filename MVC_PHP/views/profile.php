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
    <?php include 'views/nav.php'; ?>
      <div class='container'>
            <div class='registry-box'>
              <div class='row'>
                  <div class='col-md-6 login-left'>
                      <h2><?php $_SESSION['username'] ?></h2>
                      <h3>Adataidat itt tudod frissíteni</h3>
                  </div>
              </div>
            </div>

        <form method="post" action="index.php?c=profile">
          <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
          </div>
          <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
          </div>
          <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
          </div>
          <div class="input-group">
            <button type="submit" class="btn" name="updateData">Frissítés</button>
          </div>
        </form>

        <?php 
          if(isset($VIEWDATA['address'])){
              foreach($VIEWDATA['address'] as $address){
                  echo"
                  <div class='registry-box'>
                      <div class='row'>
                          <div class='col-md-6 login-left'>
                              <h4>Irányítószám: ".$address['postalcode']."</h4>
                              <h4>Város: ".$address['city']."</h4>
                              <h4>Utca: ".$address['street']."</h4>
                              <h4>Házszám: ".$address['number']."</h4>
                              <h4>Egyéb: ".$address['other']."</h4>
                          </div>
                      </div>
                  </div>
                  ";
              }     
          }
          
          ?>

        <div class='registry-box'>
                <div class='row'>
                    <div class='col-md-6 login-left'>
                        <h3>Új lakcím hozzáadása</h3>
                    </div>
                </div>
        </div>

        <form method="post" action="index.php?c=profile">
              <div class="input-group">
                <label>Irányítószám</label>
                <input type="number" name="postalcode" id="zip" require>
                <script src="js/getCityFromZipJS.js"> </script>
                <?php include("controllers/cityFromZipCode.php"); ?>
              </div>
              <div class="input-group">
                <label>Város</label>
                <input type="text" name="city" id="city" require>
              </div>
              <div class="input-group">
                <label>Közterület neve, jellege</label>
                <input type="text" name="street" require>
              </div>
                <div class="input-group">
                <label>Házszám</label>
                <input type="text" name="number" require>
              </div>
                <div class="input-group">
                <label>Emelet, ajtó</label>
                <input type="text" name="other">
              </div>
              <div class="input-group">
                <button type="submit" class="btn" name="newAddress">Hozzáadás</button>
              </div>
        </form>
    </div>
  </body>
</html>
