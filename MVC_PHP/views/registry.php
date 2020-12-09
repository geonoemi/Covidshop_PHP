<!doctype html>
<html>

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Kezdolap</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/cart.js"></script>
      <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>
    <?php include 'views/nav.php'; ?>
      <div class='container'>
          <div class='registry-box'>
            <div class='row'>
                <div class='col-md-6 login-left'>
                    <h2>Regisztráció</h2>
                    <h3>Ha regisztrálsz nálunk, a vásárlási folyamat gyorsan végrehajtható lesz,
                    akár több kiszállítási címet is megadhatsz, a megrendelések nyomonkövethetőek lesznek,
                    és még számos egyéb lehetőség vár rád.</h3>

                </div>
            </div>
          </div>

        <form id="registryForm" method="post" action="index.php?c=registry">
        <!--?php include("controllers/registryValidate.php"); ?-->

          <div class="input-group">
            <label>Username</label>
            <input id="username" type="text" name="username" value="" required>
          </div>
          <div class="input-group">
            <label>Email</label>
            <input id="email" type="email" name="email" value="" required>
          </div>
          <div class="input-group">
            <label>Password</label>
            <input id="pw1" type="password" name="password_1" required>
          </div>
          <div class="input-group">
            <label>Confirm password</label>
            <input id="pw2" type="password" name="password_2" required>
          </div>
          <div class="input-group">
            <button id="submit" type="submit" class="btn" name="reg_user">Regisztráció</button>
          </div>
          <!--script src="js/registryValidate.js"> </script-->

        </form>
    </div>
  </body>
</html>
