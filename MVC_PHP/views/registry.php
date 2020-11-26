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

        <form method="post" action="index.php?c=registry">

          <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="">
          </div>
          <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="">
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
            <button type="submit" class="btn" name="reg_user">Register</button>
          </div>
          
        </form>
    </div>
  </body>
</html>
